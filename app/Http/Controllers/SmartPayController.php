<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Users;
use App\Models\UserPacket;
use App\Models\UserOperation;
use App\Models\UserStatus;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers;

class SmartPayController extends Controller
{
    public $sentMoney = 0;
    public function createOrder(Request $request) {
        $result['message'] = 'Временно недоступно';
        $result['status'] = false;
        if (!$request->packet_id) {                        
            return response()->json($result);
        }
        if (!Auth::check()) {                
            return response()->json($result);
        }
        $price = 0;
        $order_code = time();        
        $packet_old_price = 0; 
        $packet = Packet::where('packet_id', $request->packet_id)->first();       
        if (!$packet) {
            return response()->json($result);
        }
        if ($packet->is_upgrade_packet == 1) {

            $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                ->where('is_active', '=', '0')
                ->where('user_packet.packet_id', '!=', 9)
                ->where('is_portfolio', '=', $packet->is_portfolio)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            if ($request->packet_id > 2) {
                $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                    ->where('packet_id', '>=', $request->packet_id)
                    ->where('is_portfolio', '=', $packet->is_portfolio)
                    ->where('user_packet.packet_id', '!=', 9)
                    ->where('is_active', 1)
                    ->count();

                if ($is_check > 0) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }
            }
            $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id);
        }
        
        $price = ($packet->packet_price - $packet_old_price) * \App\Models\Currency::pvToKzt();
        $name = 'Покупка пакета ' . $packet->packet_name_ru . ' на сайте Qpartner.club';        
        $data = [
            'MERCHANT_ID' => env('SMART_PAY_MERCHANT_ID'),
            'PAYMENT_AMOUNT' => 100,
            'PAYMENT_ORDER_ID' => $order_code,
            'PAYMENT_INFO' => $name,
            'PAYMENT_CALLBACK_URL' => env('SMART_PAY_CALLBACK_URL'),
            'PAYMENT_RETURN_URL' => env('SMART_PAY_RETURN_URL'),
            'PAYMENT_RETURN_FAIL_URL' => env('SMART_PAY_FAIL_URL'),
        ];

        $sign = Helpers::make_signature($data, env('SMART_PAY_KEY')); // формируем ключ
        $data['PAYMENT_HASH'] = $sign;
        $response = Helpers::send_request('https://spos.kz/merchant/api/create_invoice', $data);        
        if($response->status === 0) { // проверяем статус выполнения            
            $data_order = [
                'order_code' => $order_code,
                'user_id' => Auth::user()->user_id,
                'username' => Auth::user()->name .' '. Auth::user()->last_name ,
                'email' => Auth::user()->email,
                'address' => null,
                'contact' => Auth::user()->phone,
                'sum' => $price,
                'products' => null,
                'packet_id' => $request->packet_id,
                'payment_id' => $response->data->id
            ];
            $order = Order::createOrder($data_order);             
            if ($order) {
                return response()->json(['url' => $response->data->url]);
                // return  redirect()->away($response->data->url); // направляем пользователя на страницу оплаты
            }
            return response()->json($result);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)                         
            return response()->json($result);
        }
    }
    
    public function callback(Request $request) {

        $input_data = $request->all();
        Log::info($input_data);
        Log::info('callback');
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = Helpers::make_signature($input_data, env('SMART_PAY_KEY'));
            Log::info('true merch');
            if($input_data['PAYMENT_HASH'] == $sign) {
                Log::info('true hash');
                $order = Order::getByCode($input_data['PAYMENT_ORDER_ID']);
                Log::info($order);
                if ($order) {
                    if ($input_data['PAYMENT_STATUS'] != 'paid') {
                        return response()->json(['RESULT'=>'OK']);
                    }
                    Order::changeIsPaid($input_data['PAYMENT_ORDER_ID']);
                    $packet = Packet::where('packet_id', $order->packet_id)->first();
                    
                    $user_packet = new UserPacket();
                    $user_packet->user_id = $order->user_id;
                    $user_packet->packet_id = $order->packet_id;
                    $user_packet->user_packet_type = null;
                    $user_packet->packet_price = $packet->packet_price;
                    $user_packet->is_active = 0;
                    $user_packet->is_epay = 1;
                    $user_packet->is_portfolio = $packet->is_portfolio;
                    $user_packet->save();
                    Log::info($user_packet);
                    $bonus_system = app(\App\Http\Controllers\Admin\PacketController::class)->implementPacketBonuses($user_packet->user_packet_id);
                }
                // маркируем заказ с ИД PAYMENT_ORDER_ID как оплаченый
                return response()->json(['RESULT'=>'OK']);
            } else {
                Log::info('true hash');
                // не совпадает цифровая подпись.
                return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
            }
        }
        Log::info('false merch');
        return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
    }

    public function createOrderPartnerProduct(Request $request)
    {
        $result['message'] = 'Временно недоступно';
        $result['status'] = false;  
        if (!Auth::check()) {
            return response()->json($result);
        }
        $price = 0;
        $order_code = time();
        $name = 'Покупка товаров на сайте Qpartner.club';
        $sum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            $sum += $product_price->product_price * $item->unit;
        }
        if (count($products) != count($products_id)) {                 
            return response()->json($result);
        }
        foreach ($products as $product) {
            if (Auth::check()) {
                $userPacket = UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', true)->get();
                if ($userPacket) {
                    $discount_price = $product->product_price - ($product->product_price * \App\Models\Currency::PartnerDiscount);
                    $discount_price = $discount_price * \App\Models\Currency::pvToKzt();
                    $discount_price = round($discount_price) * $request->products_count[$product->product_id];
                    $price += $discount_price;
                }
            }
            else {
                $product_price = $product->product_price * \App\Models\Currency::pvToKzt();
                $product_price = round($product_price) * $request->products_count[$product->product_id];
                $price += $product_price;
            }
        }

        $data = [
            'MERCHANT_ID' => env('SMART_PAY_MERCHANT_ID'),
            'PAYMENT_AMOUNT' => 100,
            'PAYMENT_ORDER_ID' => $order_code,
            'PAYMENT_INFO' => $name,
            'PAYMENT_CALLBACK_URL' => env('SMART_PAY_CALLBACK_URL'),
            'PAYMENT_RETURN_URL' => env('SMART_PAY_RETURN_URL'),
            'PAYMENT_RETURN_FAIL_URL' => env('SMART_PAY_FAIL_URL'),
        ];

        $sign = Helpers::make_signature($data, env('SMART_PAY_KEY')); // формируем ключ
        $data['PAYMENT_HASH'] = $sign;
        $response = Helpers::send_request('https://spos.kz/merchant/api/create_invoice', $data);        
        if($response->status === 0) { // проверяем статус выполнения            
            $data_order = [
                'order_code' => $order_code,
                'user_id' => Auth::check() ? Auth::user()->user_id : null,
                'username' => Auth::check() ? Auth::user()->name .' '. Auth::user()->last_name : $request->username,
                'email' => Auth::check() ? Auth::user()->email : $request->email,
                'address' => $request->address ?? null,
                'contact' => Auth::check() ? Auth::user()->phone : $request->contact,
                'sum' => $price,
                'products' => $request->products ? \json_encode($products) : null,
                'packet_id' => null,
                'payment_id' => $response->data->id
            ];
            $order = Order::createOrder($data_order);             
            if ($order) {
                return response()->json(['url' => $response->data->url]);
                // return  redirect()->away($response->data->url); // направляем пользователя на страницу оплаты
            }
            return response()->json($result);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)                         
            return response()->json($result);
        }
        
    }

    public function callbackPartnerProduct() {  
        
        $input_data = $request->all();
        Log::info($input_data);
        Log::info('callback');
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = Helpers::make_signature($input_data, env('SMART_PAY_KEY'));
        
            if($input_data['PAYMENT_HASH'] == $sign) {
                $order = Order::getByCode($input_data['PAYMENT_ORDER_ID']);
                if ($order) {
                    if ($input_data['PAYMENT_STATUS'] != 'paid') {
                        return response()->json(['RESULT'=>'OK']);
                    }
                    Order::changeIsPaid($input_data['PAYMENT_ORDER_ID']);
                    if ($order->user_id) {
                        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
                        foreach ($products as $item) {
                            $product = Product::where('product_id', $item->product_id)->first();
                            $user_basket = UserBasket::where('user_basket_id', $item->user_basket_id)->first();
                            $user_basket->product_price = $product->product_price;
                            $user_basket->is_active = 1;
                            $user_basket->save();              
                        }  
                        $price = round($order->sum / \App\Models\Currency::pvToKzt());
                        $inviter_order = 1;
                        $user = Users::where(['user_id' => $order->user_id])->first();
                        $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();
                        $actualStatuses = [UserStatus::CONSULTANT, UserStatus::PREMIUM_MANAGER, UserStatus::ELITE_MANAGER,
                        UserStatus::VIP_MANAGER, UserStatus::BRONZE_MANAGER, UserStatus::SILVER_MANAGER, UserStatus::GOLD_MANAGER, UserStatus::RUBIN_DIRECTOR,
                        UserStatus::SAPPHIRE_DIRECTOR, UserStatus::EMERALD_DIRECTOR, UserStatus::DIAMOND_DIRECTOR];                            
                        while ($inviter) {                                  
                            $bonus = 0;
                            $bonusPercentage = round($price * (8.34 / 100), 0);
                            $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
                            $inviterCount = (count($inviterPacketId));
                            if ($inviterCount) {  
                                $inviterPacketId = collect($inviterPacketId);
                                $inviterPacketId = $inviterPacketId->map(function ($item) {
                                    return $item->packet_id;
                                });
                                $inviterPacketId = max($inviterPacketId->all());
                                $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;                                                                      
                                if (in_array($inviter->status_id, $actualStatuses) && $this->hasNeedPackets($inviterPacketId, $inviter_order)) {                                        
                                    $bonus = $bonusPercentage; 
                                }
                            }    
                            if ($bonus) {
                                $operation = new UserOperation();
                                $operation->author_id = $user->user_id;
                                $operation->recipient_id = $inviter->user_id;
                                $operation->money = $bonus;
                                $operation->operation_id = 1;
                                $operation->operation_type_id = 1;
                                $operation->operation_comment = 'За покупку продукта. Уровень - ' . $inviter_order;
                                $operation->save();
                                $inviter->user_money = $inviter->user_money + $bonus;
                                $inviter->save();
                                $this->sentMoney += $bonus;
                            }
                            $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
                            if (!$inviter || $inviter_order >= 8) {
                                break;
                            }    
                            $inviter_order++;
                        }
                        
                        //пополнение фонда компании
                        $company_money = $price - $this->sentMoney;
                        $operation = new UserOperation();
                        $operation->author_id = $order->user_id;
                        $operation->recipient_id = 1;
                        $operation->money = $company_money;
                        $operation->operation_id = 1;
                        $operation->operation_type_id = 6;
                        $operation->operation_comment = 'За покупку продукта';
                        $operation->save();
            
                        $company = Users::where('user_id', 1)->first();
                        $company->user_money = $company->user_money + $company_money;
                        $company->save();
                    }
                }
                // маркируем заказ с ИД PAYMENT_ORDER_ID как оплаченый
                return response()->json(['RESULT'=>'OK']);
            } else {
                // не совпадает цифровая подпись.
                return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
            }
        }
        return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);        
    }
    
    public function createOrderProduct(Request $request) {
        $result['message'] = 'Временно недоступно';
        $result['status'] = false;  
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'product_count' => 'required|integer',
            'username' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'delivery' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all(); 
            $result['message'] = $error[0];           
            return response()->json($result);
        }

        $product = Product::where('product_id', $request->product_id)->first();
        
        $price = 0;
        $name = 'Покупка товара на сайте Qpartner.club';
        $order_code = time();
        $price = ($product->product_price * $request->product_count ) * \App\Models\Currency::pvToKzt();
        $products = [['product_id' => $product->product_id, 'product_name' => $product->product_name_ru, 'count' => $request->product_count]];
        $data = [
            'MERCHANT_ID' => env('SMART_PAY_MERCHANT_ID'),
            'PAYMENT_AMOUNT' => 100,
            'PAYMENT_ORDER_ID' => $order_code,
            'PAYMENT_INFO' => $name,
            'PAYMENT_CALLBACK_URL' => env('SMART_PAY_CALLBACK_PRODUCT_URL'),
            'PAYMENT_RETURN_URL' => env('SMART_PAY_RETURN_URL'),
            'PAYMENT_RETURN_FAIL_URL' => env('SMART_PAY_FAIL_URL'),
        ];

        $sign = Helpers::make_signature($data, env('SMART_PAY_KEY')); // формируем ключ
        $data['PAYMENT_HASH'] = $sign;
        $response = Helpers::send_request('https://spos.kz/merchant/api/create_invoice', $data);        
        if($response->status === 0) { // проверяем статус выполнения            
            $data_order = [
                'order_code' => $order_code,
                'user_id' => null,
                'username' => $request->username ,
                'email' => $request->email,
                'address' => $request->address,
                'contact' => $request->contact,
                'sum' => $price,
                'products' => \json_encode($products),
                'packet_id' => null,
                'payment_id' => $response->data->id,
                'delivery_id' => $request->delivery
            ];
            $order = Order::createOrder($data_order);             
            if ($order) {                
                return response()->json(['url' => $response->data->url]);
                // return  redirect()->away($response->data->url); // направляем пользователя на страницу оплаты
            }
            return response()->json($result);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)                         
            return response()->json($result);
        }
    }

    public function callbackProduct() {
        $input_data = $request->all();
        Log::info($input_data);
        Log::info('callback');
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = Helpers::make_signature($input_data, env('SMART_PAY_KEY'));            
            if($input_data['PAYMENT_HASH'] == $sign) {
                $order = Order::getByCode($input_data['PAYMENT_ORDER_ID']);                
                if ($order) {
                    if ($input_data['PAYMENT_STATUS'] == 'paid') {
                        Order::changeIsPaid($input_data['PAYMENT_ORDER_ID']);   
                    }
                    // маркируем заказ с ИД PAYMENT_ORDER_ID как оплаченый
                    return response()->json(['RESULT'=>'OK']);
                }                
            } else {
                // не совпадает цифровая подпись.
                return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
            }
        }        
        return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
    }

    public function fail(Request $request) {
        Log::info($request);
        return $request;
    }

    public function return(Request $request) {

        Log::info('ssss');
        return redirect('/')->withInput(['success' => 'Оплата прошла удачно']);
        return $request;
    }

    public function hasNeedPackets($inviterPacketId, $order)
    {
        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2, Packet::VIP, Packet::GAP1, Packet::GAP2, Packet::GAP];
        $boolean = false;
        if ($inviterPacketId == Packet::ELITE_FREE) {
            $inviterPacketId = Packet::ELITE;
        }
        $inviterPacket = Packet::where(['packet_id' => $inviterPacketId])->first();
        $packet_available_level = $inviterPacket->packet_available_level;
        if ($order <= $packet_available_level) {
            $boolean = true;
        }
        return $boolean;
    }
}
