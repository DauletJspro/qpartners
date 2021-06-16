<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\CashbackShopping;
use App\Models\Currency;
use App\Models\Fond;
use App\Models\Operation;
use App\Models\Packet;
use App\Models\Product;
use App\Models\UserBasket;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\Order;
use App\Models\UserStatus;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use View;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {
        Product::where('is_show', 1)->update(['product_price' => 15]);
        $request->products = Product::where('is_show', 1)
            ->orderBy('sort_num', 'asc')
            ->select('*')
            ->paginate(20);

        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        if ($request->is_partner) {
            $request->is_partner = UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', 1)->exists();
        }
        if ($request->is_packet) {
            $request->is_packet = Auth::user()->product_balance > 0;
        }
        
        return view('admin.online-shop.product', [
            'row' => $request
        ]);
    }


    public function addProductToBasket(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();

        if ($user_basket != null) {
            $result['error'] = 'Этот товар уже добавлен в корзину!';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = new UserBasket();
        $user_basket->user_id = Auth::user()->user_id;

        //Проверка роля пользователя и добавляем цену в user_basket
        if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1){
            $user_basket->product_price = $product->price_shareholder;
        }elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0){
            $user_basket->product_price = $product->price_partner;
        }else{
            $user_basket->product_price = $product->price_client;
        }

        $user_basket->product_id = $product->product_id;
        $user_basket->is_active = 0;
        $user_basket->save();

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        return response()->json($result);
    }
//Показать корзину
    public function showBasket(Request $request)
    {
        $request->basket = UserBasket::leftJoin('product', 'product.product_id', '=', 'user_basket.product_id')
            ->where('user_basket.user_id', Auth::user()->user_id)
            ->where('user_basket.is_active', 0)
            ->select('product.*', 'user_basket.unit')
            ->get();
        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        foreach ($request->basket as $item) {
            //Проверка роль пользователя и через это делаем тотал
            $product_price = Product::where('product_id', $item->product_id)->first();
            if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1){
                $sum += $product_price->price_shareholder * $item->unit;
                $ballSum += $product_price->ball_shareholder * $item->unit;
            }elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0){
                $sum += $product_price->price_partner * $item->unit;
                $ballSum += $product_price->ball_partner * $item->unit;
            }else{
                $sum += $product_price->price_client * $item->unit;
                $ballSum += $product_price->ball_client * $item->unit;
            }
        }

        if ($request->is_partner) {
            $request->is_partner = UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', 1)->exists();
        }
        if ($request->is_packet) {
            $request->is_packet = Auth::user()->product_balance > 0;
        }

        $pay_from_cash_balanse = false;
        $user_vip_packet = UserPacket::where('packet_id', Packet::VIP2)->where('user_id', Auth::user()->user_id)->where('is_active',1)->count();
        $user_gap_packet = UserPacket::where('packet_id', Packet::GAP)->where('user_id', Auth::user()->user_id)->where('is_active',1)->count();
        if ($user_vip_packet > 0 && $user_gap_packet > 0) {            
            $pay_from_cash_balanse = true;
        }
        return view('admin.online-shop.basket', [
            'row' => $request,
            'pay_from_cash_balanse' => $pay_from_cash_balanse,
            'total_sum' => $sum,
            'total_ball' => $ballSum

        ]);
    }

    public function deleteProductFromBasket(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();
        $user_basket->delete();

        $sum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            $sum += $product_price->product_price * $item->unit;
        }

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        $result['sum'] = $sum;
        return response()->json($result);
    }

    //Ajax количество каждого товара
    public function setProductUnit(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();
        if ($user_basket == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket->unit = $request->unit;
        $user_basket->save();

        $sum = 0;
        $ballSum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            //Проверка роль пользователя и через это делаем тотал
            if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1){
                $sum += $product_price->price_shareholder * $item->unit;
                $ballSum += $product_price->ball_shareholder * $item->unit;
            }elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0){
                $sum += $product_price->price_partner * $item->unit;
                $ballSum += $product_price->ball_partner * $item->unit;
            }else{
                $sum += $product_price->price_client * $item->unit;
                $ballSum += $product_price->ball_client * $item->unit;
            }

        }

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        $result['sum'] = $sum;
        $result['ballSum'] = $ballSum;
        return response()->json($result);
    }
    //Подверждение заказа
    public function confirmBasket(Request $request)
    {
        $result['error'] = 'Временно недоступно';
        $result['status'] = false;

        //Dates
        $firstDayOfMonth = Carbon::now()->firstOfMonth()->toDateString();
        $lastDayOfMonth = Carbon::now()->endOfMonth()->toDateString();


        $user = Auth::user();
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();

        $shopping_table = CashbackShopping::select('*', DB::raw('SUM(cash) as sum'))
            ->where('user_id', $user->user_id)
            ->where('created_at', '>=', $firstDayOfMonth)
            ->where('created_at', '<=', $lastDayOfMonth)
            ->groupBy(DB::raw('MONTH(created_at)'))->first();
        $LIMIT = 100000;

        $sum = 0;
        $total_price = 0;
        $products_all = [];
        $products_item = [];

        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'address' => 'required|string',
            'delivery_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            $result['message'] = $error[0];
            return response()->json($result);
        }
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();

            if (Auth::user()->role_id == 2 && Auth::user()->is_activated == 1){
                $sum += $product_price->price_shareholder * $item->unit;
            }elseif (Auth::user()->role_id == 2 && Auth::user()->is_activated == 0){
                $sum += $product_price->price_partner * $item->unit;
            }else{
                $sum += $product_price->price_client * $item->unit;
            }

            $products_item['product_id'] = $product_price->product_id;
            $products_item['product_name'] = $product_price->product_name_ru;
            $products_item['count'] = $item->unit;
            $products_item['ball'] = $product_price->ball;
            array_push($products_all, $products_item);
        }
// cashback start

      if($request->cashback == "true"){
          $sum = $sum * Currency::where('currency_id', 1)->first()->money;
          $request['sum'] = $sum;
          $request['products'] = \json_encode($products_all);
          $request['is_paid'] = true;
          $data = $request->all();
          $user_cash = $user->user_cash * (Currency::where('currency_id', 1)->first()->money);
          if($user_cash >= $sum){
              if($shopping_table->sum + $sum <= $LIMIT){
                  $user->user_cash  = ($user_cash - $sum) / Currency::where('currency_id', 1)->first()->money;
                  Order::create($data);
                  foreach($products as $product){
                      $product->is_active = 1;
                      $product->save();
                  }
                  CashbackShopping::create([
                      'user_id' => $user->user_id,
                      'cash' => $sum,
                  ]);
                  $user->save();
                  $result['status'] = true;
                  return response()->json($result);
              }else{
                  $result['error'] = 'Вы превысили лимит на покупку через кэшбэк!';
                  $result['status'] = false;
                  return response()->json($result);
              }
          }else{
              $result['error'] = 'У вас недостаточно средств';
              $result['status'] = false;
              return response()->json($result);
          }
      }
// cashback end

        if ($request->type == 'is_packet') {
            $sum = $sum - ($sum * \App\Models\Currency::PacketDiscount);
            $sum = round($sum);
            if (Auth::user()->product_balance < $sum) {
                $result['error'] = 'У вас недостаточно бонусов';
                return response()->json($result);
            }
            $user->product_balance = $user->product_balance - $sum;
            $user->save();
            $products = UserBasket::where('user_id', $user->user_id)->where('is_active', 0)->get();
            foreach ($products as $item) {
                $product = Product::where('product_id', $item->product_id)->first();
                $user_basket = UserBasket::where('user_basket_id', $item->user_basket_id)->first();
                $user_basket->product_price = $product->product_price;
                $user_basket->is_active = 1;
                $user_basket->save();
            }
            if ($user->product_balance == 0) {
                UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', 1)->where('is_paid', 0)->update(['is_paid' => 1]);
            }
            // $result['status'] = true;
            // return response()->json($result);
        }
        elseif ($request->type == 'is_super') {
            $products = UserBasket::where('user_id', $user->user_id)->where('is_active', 0)->get();
            foreach ($products as $item) {
                $product = Product::where('product_id', $item->product_id)->first();
                $user_basket = UserBasket::where('user_basket_id', $item->user_basket_id)->first();
                $user_basket->product_price = $product->product_price;
                $user_basket->is_active = 1;
                $user_basket->save();
            }
        }
        elseif ($request->type == 'is_partner') {
            $is_partner = UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', 1)->exists();
            if (!$is_partner) {
                $result['error'] = 'Вы не являетесь партнером';
                $result['status'] = false;
                return response()->json($result);
            }
            $sum = $sum - ($sum * \App\Models\Currency::PartnerDiscount);
            $sum = round($sum);
        }
        else {
            $sum = $sum - ($sum * \App\Models\Currency::ClientDiscount);
            $sum = round($sum);
        }
        //Снять с баланса
        if (Auth::user()->user_money < $sum) {
            $result['error'] = 'У вас недостаточно средств';
            $result['status'] = false;
            return response()->json($result);
        }
        //Берем тотал балл и прайс
        foreach ($products as $item)
        {
            //Проверка роль юзера и делаем тотал для балл и цены
            $product_price = Product::where('product_id', $item->product_id)->first();
            if (Auth::user()->role_id == 2 && Auth::user()->is_activated == 1){
                $total_price += $product_price->price_shareholder * $item->unit;
                $total_ball += $product_price->ball_shareholder * $item->unit;
            }elseif (Auth::user()->role_id == 2 && Auth::user()->is_activated == 0){
                $total_price += $product_price->price_partner * $item->unit;
                $total_ball += $product_price->ball_partner * $item->unit;
            }else{
                $total_price += $product_price->price_client * $item->unit;
                $total_ball += $product_price->ball_client * $item->unit;
            }
        }

        //Cashback себе и 1-8 уровень
        $this->NewCashbackImplement($total_ball);
//        $this->implementCashback(Auth::user()->user_id);

        $operation = new UserOperation();
        $operation->author_id = null;
        $operation->recipient_id = $user->user_id;
        $operation->money = $total_price * -1;
        $operation->operation_id = 2;
        $operation->operation_type_id = 21;
        $operation->operation_comment = '';
        $operation->save();

        $user->user_money = $user->user_money - $total_price;
        $user->save();
        $data_order = [
            'order_code' => time(),
            'user_id' => Auth::user()->user_id,
            'username' => Auth::user()->name .' '. Auth::user()->last_name ,
            'email' => Auth::user()->email,
            'address' => $request->address,
            'contact' => Auth::user()->phone,
            'sum' => $total_price,
            'products' => \json_encode($products_all),
            'packet_id' => null,
            'payment_id' => 0,
            'delivery_id' => $request->delivery_id,
            'is_paid' => 1
        ];
        $order = Order::createOrder($data_order);

        //Ставляем 1 на is_active
        foreach($products as $product){
            $product->is_active = 1;
            $product->save();
        }
        $result['status'] = true;
        return response()->json($result);
    }


    public function implementCashback($user_id) {
        $actualStatuses = [
            UserStatus::FREE_ELITE_OWNER,
            UserStatus::PREMIUM_MANAGER,
            UserStatus::ELITE_MANAGER,
            UserStatus::VIP_MANAGER,
            UserStatus::BRONZE_MANAGER,
            UserStatus::SILVER_MANAGER,
            UserStatus::PLATINUM_MANAGER,
            UserStatus::GOLD_MANAGER,
            UserStatus::RUBIN_DIRECTOR,
            UserStatus::SAPPHIRE_DIRECTOR,
            UserStatus::EMERALD_DIRECTOR,
            UserStatus::DIAMOND_DIRECTOR
        ];
        $user = Users::where('user_id', $user_id)->first();
        $percent = 8.33;
        $products = UserBasket::where('user_id', $user->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product = Product::where('product_id', $item->product_id)->first();
            $user_basket = UserBasket::where('user_basket_id', $item->user_basket_id)->first();
            $user_basket->product_price = $product->product_price;
            $user_basket->is_active = 1;
            $user_basket->save();

            $user_id = $user->recommend_user_id;

            $counter = 0;
            while ($user_id) {
                $counter++;
                $parent = Users::where('user_id', $user_id)->first();
                if ($parent == null) break;
                $user_id = $parent->recommend_user_id;
                if (in_array($parent->status_id, $actualStatuses)) {                    
                    $cash = ($product->ball * $item->unit) * $percent / 100;
                    $cash = round($cash);

                    if ($cash > 0) {
                        $parent->user_money += $cash;
                        $parent->save();
                        $operation = new UserOperation();
                        $operation->author_id = $user->user_id;
                        $operation->recipient_id = $parent->user_id;
                        $operation->money = $cash;
                        $operation->operation_id = 1;
                        $operation->operation_type_id = 22;
                        $operation->operation_comment = sprintf('Cash Back. %s pv Уровень - %s', $cash, $counter);
                        $operation->save();
                    }
                }
                if ($counter == 8) {
                    break;
                }
            }
        }
    }

    public function showHistory(Request $request)
    {
        $request->basket = UserBasket::leftJoin('product', 'product.product_id', '=', 'user_basket.product_id')
            ->where('user_basket.user_id', Auth::user()->user_id)
            ->where('user_basket.is_active', 1)
            ->orderBy('user_basket_id', 'desc')
            ->select('product.*',
                'user_basket.unit',
                'user_basket.product_price',
                DB::raw('DATE_FORMAT(user_basket.created_at,"%d.%m.%Y %H:%i") as date'))
            ->get();

        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();

        return view('admin.online-shop.history', [
            'row' => $request
        ]);
    }
    public function NewCashbackImplement($total_ball){
        //Самому покупателю Cashback 15%
        $user = Auth::user();
        $user_cash = Auth::user()->user_cash;
        $BONUS_15 = $user_cash + $total_ball * 0.15;
        $user->user_cash = $BONUS_15;

        //Создаем юзер операцию ключ значение
        UserOperation::create([
            'operation_id' => 1,
            'money' => $total_ball * 0.15,
            'author_id' => $user->user_id,
            'recipient_id' => $user->user_id,
            'operation_type_id' => 22,
            'operation_comment' => 'CashBack от покупки товара Gap Market'
        ]);

        $recommend_user_id = Auth::user()->recommend_user_id;
        $counter = 0;
        //Cashback до восьмого уровня 5%
        while ($recommend_user_id != null && $counter < 8){
            $recommend_user = Users::where('user_id',$recommend_user_id)->where('is_activated', true)->first();
            $user_cash = $recommend_user->user_cash;
            $user_money = $recommend_user->user_money;
            $BONUS_5 = $total_ball * 0.05;
            $recommend_user_id = $recommend_user->recommend_user_id;
            $counter++;
            if ($counter == 1 ){
                $user_money = $user_money + $BONUS_5;
                $recommend_user->update([
                    'user_money' => $user_money
                ]);
                UserOperation::create([
                    'operation_id' => 1,
                    'money' => $BONUS_5,
                    'author_id' => Auth::user()->user_id,
                    'recipient_id' => $recommend_user->user_id,
                    'operation_type_id' => 1,
                    'operation_comment' => 'Структурный бонус "GAP Market" ' . $counter . ' уровень.'
                ]);
            }else{
                $cashback = $user_cash + $BONUS_5;
                $recommend_user->update([
                    'user_cash' => $cashback
                ]);
                UserOperation::create([
                    'operation_id' => 1,
                    'money' => $BONUS_5,
                    'author_id' => Auth::user()->user_id,
                    'recipient_id' => $recommend_user->user_id,
                    'operation_type_id' => 22,
                    'operation_comment' => 'CashBack от покупки GAP Market ' . $counter . ' уровень.'
                ]);
            }
        }
    }
}
