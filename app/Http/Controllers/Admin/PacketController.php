<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Currency;
use App\Models\Fond;
use App\Models\Operation;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;
use View;
use DB;
use URL;

class PacketController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile',['except' => ['AcceptUserPacketPayBox','acceptPacketFunction']]);
        $this->middleware('admin', ['only' => ['inactiveUserPacket','activeUserPacket','deleteInactiveUserPacket','acceptInactiveUserPacket']]);
    }

    public function getPacketById($id){
        $packet = Packet::find($id);
        $result['status'] = false;
        $result['title'] = $packet->packet_name_ru;
        $result['desc'] = $packet->packet_desc_ru;
        return response()->json($result);
    }

    public function activeUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users','users.user_id','=','user_packet.user_id')
            ->leftJoin('packet','packet.packet_id','=','user_packet.packet_id')
            ->leftJoin('users as recommend','recommend.user_id','=','users.recommend_user_id')
            ->leftJoin('city','city.city_id','=','users.city_id')
            ->leftJoin('country','country.country_id','=','city.country_id')
            ->where('user_packet.is_active',1)
            ->orderBy('user_packet.user_packet_id','desc')
            ->select('users.*','user_packet.*','packet.*','city.*','country.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if(isset($request->user_name) && $request->user_name != '')
            $row->where(function($query) use ($request){
                $query->where('users.name','like','%' .$request->user_name .'%')
                    ->orWhere('users.last_name','like','%' .$request->user_name .'%')
                    ->orWhere('users.login','like','%' .$request->user_name .'%')
                    ->orWhere('users.email','like','%' .$request->user_name .'%')
                    ->orWhere('users.middle_name','like','%' .$request->user_name .'%');
            });

        if(isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function($query) use ($request){
                $query->where('recommend.name','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.last_name','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.login','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.email','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.middle_name','like','%' .$request->sponsor_name .'%');
            });

        if(isset($request->packet_name) && $request->packet_name != '')
            $row->where(function($query) use ($request){
                $query->where('packet.packet_name_ru','like','%' .$request->packet_name .'%');
            });

        if(isset($request->date_from) && $request->date_from != ''){
            $timestamp = strtotime($request->date_from);
            $row->where(function($query) use ($timestamp){
                $query->where('user_packet.created_at','>=',date("Y-m-d H:i", $timestamp));
            });
        }

        if(isset($request->date_to) && $request->date_to != ''){
            $timestamp = strtotime($request->date_to);
            $row->where(function($query) use ($timestamp){
                $query->where('user_packet.created_at','<=',date("Y-m-d H:i", $timestamp));
            });
        }

        $row = $row->paginate(10);

        return  view('admin.active-user-packet.packet',[
            'row' => $row,
            'request' => $request
        ]);
    }
    
    public function inactiveUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users','users.user_id','=','user_packet.user_id')
            ->leftJoin('packet','packet.packet_id','=','user_packet.packet_id')
            ->leftJoin('users as recommend','recommend.user_id','=','users.recommend_user_id')
            ->where('user_packet.is_active',0)
            ->orderBy('user_packet.user_packet_id','asc')
            ->select('users.*','user_packet.*','packet.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if(isset($request->user_name) && $request->user_name != '')
            $row->where(function($query) use ($request){
                $query->where('users.name','like','%' .$request->user_name .'%')
                    ->orWhere('users.last_name','like','%' .$request->user_name .'%')
                    ->orWhere('users.login','like','%' .$request->user_name .'%')
                    ->orWhere('users.email','like','%' .$request->user_name .'%')
                    ->orWhere('users.middle_name','like','%' .$request->user_name .'%');
            });

        if(isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function($query) use ($request){
                $query->where('recommend.name','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.last_name','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.login','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.email','like','%' .$request->sponsor_name .'%')
                    ->orWhere('recommend.middle_name','like','%' .$request->sponsor_name .'%');
            });

        if(isset($request->packet_name) && $request->packet_name != '')
            $row->where(function($query) use ($request){
                $query->where('packet.packet_name_ru','like','%' .$request->packet_name .'%');
            });

        $row = $row->paginate(10);

        return  view('admin.inactive-user-packet.packet',[
            'row' => $row,
            'request' => $request
        ]);
    }

    public function sendResponseAddPacket(Request $request)
    {
        $packet = Packet::where('packet_id',$request->packet_id)->first();
        if($packet == null){
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('is_active','=','0')->where('is_portfolio','=',$packet->is_portfolio)->count();

        if($is_check > 0){
            $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
            $result['status'] = false;
            return response()->json($result);
        }

        if($request->packet_id > 2){
            $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('packet_id','>=',$request->packet_id)->where('is_portfolio','=',$packet->is_portfolio)->where('is_active',1)->count();
            if($is_check > 0){
                $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                $result['status'] = false;
                return response()->json($result);
            }
        }

        $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('packet_id','=',$request->packet_id)->count();
        if($is_check > 0){
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet_old_price = UserPacket::where('user_id',Auth::user()->user_id)
            ->where('packet_id','>',2)
            ->where('is_active',1)
            ->where('is_portfolio','=',$packet->is_portfolio)
            ->sum('packet_price');

        $packet = Packet::where('packet_id',$request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price - $packet_old_price;
        $user_packet->is_active = 0;
        $user_packet->is_portfolio = $packet->is_portfolio;
        $user_packet->save();

        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function cancelResponsePacket(Request $request)
    {
        $is_check = UserPacket::where('user_id',Auth::user()->user_id)
            ->where('packet_id',$request->packet_id)
            ->where('is_active',0)
            ->first();

        if($is_check == null){
            $result['message'] = 'Такого запроса не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $is_check->delete();

        $result['message'] = 'Вы успешно отменили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function deleteInactiveUserPacket(Request $request)
    {
        $user_packet = UserPacket::find($request->packet_id);
        $user_packet->forceDelete();
    }

    public function acceptInactiveUserPacket(Request $request)
    {
        $this->acceptPacketFunction($request->packet_id);
        $result['message'] = 'Вы успешно приняли запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function generatePayBoxCode(Request $request)
    {
        $packet = Packet::where('packet_id',$request->packet_id)->first();
        if($packet == null){
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('is_active','=','0')->where('is_portfolio','=',$packet->is_portfolio)->count();

        if($is_check > 0){
            $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
            $result['status'] = false;
            return response()->json($result);
        }

        if($request->packet_id > 2){
            $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('packet_id','>=',$request->packet_id)->where('is_portfolio','=',$packet->is_portfolio)->where('is_active',1)->count();
            if($is_check > 0){
                $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                $result['status'] = false;
                return response()->json($result);
            }
        }

        $is_check = UserPacket::where('user_id',Auth::user()->user_id)->where('packet_id','=',$request->packet_id)->count();
        if($is_check > 0){
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet_old_price = UserPacket::where('user_id',Auth::user()->user_id)
            ->where('packet_id','>',2)
            ->where('is_active',1)
            ->where('is_portfolio','=',$packet->is_portfolio)
            ->sum('packet_price');

        $packet = Packet::where('packet_id',$request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price - $packet_old_price;
        $user_packet->is_active = 0;
        $user_packet->is_epay = 1;

        $user_packet->is_portfolio = $packet->is_portfolio;

        try {
            $user_packet->save();

            $href = "";

            $rand_str = "z";
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            for ($i = 0; $i < 10; $i++) {
                $rand_str .= $characters[rand(0, strlen($characters) - 1)];
            }

            include_once("PG_Signature.php");
            $MERCHANT_SECRET_KEY = "AFPWZXFUBoBL0RWb";

            $arrReq = array();

            $currency = Currency::where('currency_name','тенге')->first();

            /* Обязательные параметры */
            $arrReq['pg_merchant_id'] = 500436;// Идентификатор магазина
            $arrReq['pg_order_id']    = $user_packet->user_packet_id;		// Идентификатор заказа в системе магазина
            $arrReq['pg_amount']      = $user_packet->packet_price * $currency->money;		// Сумма заказа
            $arrReq['pg_result_url']      = URL('/').  "/admin/packet/paybox/success/" .$user_packet->user_packet_id;
            $arrReq['pg_success_url']      = URL('/'). "/admin/packet/paybox/success/" .$user_packet->user_packet_id;
            $arrReq['pg_failure_url']      = URL('/'). "/admin/shop?error=Ошибка";
            $arrReq['pg_description'] = "Покупка пакета на QazaqMedia"; // Описание заказа (показывается в Платёжной системе)
            $arrReq['pg_salt'] = $rand_str;
            $arrReq['pg_request_method'] = "GET";
            $arrReq['pg_success_url_method'] = 'AUTOGET';
            $arrReq['pg_sig'] = \PG_Signature::make('payment.php', $arrReq, $MERCHANT_SECRET_KEY);

            $file = "log.txt";
            $current = file_get_contents($file);
            $current .= $arrReq['pg_merchant_id'] . "\n";
            $current .= $arrReq['pg_order_id'] . "\n";
            $current .= $arrReq['pg_amount'] . "\n";
            $current .= $arrReq['pg_result_url'] . "\n";
            $current .= $arrReq['pg_success_url'] . "\n";
            $current .= $arrReq['pg_failure_url'] . "\n";
            $current .= $arrReq['pg_description'] . "\n";
            $current .= $arrReq['pg_salt'] . "\n";
            $current .= $arrReq['pg_request_method'] . "\n";
            $current .= $arrReq['pg_success_url_method'] . "\n";
            $current .= $arrReq['pg_sig'] . "\n";

            $query = http_build_query($arrReq);
            $current .= $query . "\n";
            file_put_contents($file, $current);

            $href = $query;
            $result['href'] = $href;
        }
        catch (Exception $ex){
            $result['message'] = 'Ошибка база данных';
            $result['status'] = false;
            return response()->json($result);
        }


        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function acceptUserPacketPaybox(Request $request,$user_packet_id)
    {
        $this->acceptPacketFunction($user_packet_id);
        return redirect('/admin/index?message=Вы успешно купили пакет');
    }

    public function acceptPacketFunction($user_packet_id){
        $user_packet = UserPacket::find($user_packet_id);

        if($user_packet == null || $user_packet->is_active == 1) {
            $result['message'] = 'ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet_old_price = UserPacket::where('user_id',$user_packet->user_id)
            ->where('packet_id','>',2)
            ->where('is_active',1)
            ->where('is_portfolio',$user_packet->is_portfolio)
            ->sum('packet_price');

        $share_old_price = UserPacket::leftJoin('packet','packet.packet_id','=','user_packet.packet_id')
            ->where('user_id',$user_packet->user_id)
            ->where('user_packet.packet_id','>',2)
            ->where('user_packet.is_active',1)
            ->where('user_packet.is_portfolio',$user_packet->is_portfolio)
            ->max('packet.packet_share');

        $packet = Packet::find($user_packet->packet_id);

        $user_packet->is_active = 1;
        $user_packet->packet_price = $packet->packet_price - $packet_old_price;
        $max_queue_start_position = UserPacket::where('packet_id',$user_packet->packet_id)->where('is_active',1)->where('queue_start_position','>',0)->max('queue_start_position');
        $user_packet->queue_start_position = ($max_queue_start_position)?($max_queue_start_position+1):1;
        $user_packet->save();

        $user = Users::where('user_id',$user_packet->user_id)->first();

        $send_money = 0;

        $parent = Users::where('user_id', $user->recommend_user_id)->first();
        if ($parent != null) {
            $operation = new UserOperation();
            $operation->author_id = $user_packet->user_id;
            $operation->recipient_id = $parent->user_id;
            $operation->money = $user_packet->packet_price / 10;
            $operation->operation_id = 1;
            $operation->operation_type_id = 1;
            $operation->operation_comment = 'Рекрутинговый доход. "'.$packet->packet_name_ru.'". Уровень - 1';
            $operation->save();

            $parent->user_money = $parent->user_money + $user_packet->packet_price / 10;
            $parent->save();

            $send_money += $user_packet->packet_price / 10;
        }

        //выдача доли за покупку пакета
        if($packet->packet_share > 0 && $user_packet->user_packet_type == 'share'){
            $user->user_share = $user->user_share + $packet->packet_share - $share_old_price;

            $share_minus = 0;
            if($packet->is_portfolio == 0){
                $share_count = UserPacket::where('user_id',$user_packet->user_id)
                    ->where('user_packet.packet_id',3)
                    ->where('user_packet.is_active',1)
                    ->count();
                if($share_count > 0) $share_minus += 15;

                $share_count = UserPacket::where('user_id',$user_packet->user_id)
                    ->where('user_packet.packet_id',4)
                    ->where('user_packet.is_active',1)
                    ->count();
                if($share_count > 0) $share_minus += 60;

                $user->user_share -= $share_minus;
            }

            $user->save();

            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = $packet->packet_share - $share_old_price - $share_minus;
            $operation->operation_id = 1;
            $operation->operation_type_id = 2;
            $operation->operation_comment = 'За покупку пакета "'.$packet->packet_name_ru.'"';
            $operation->save();
        }
        elseif($user_packet->user_packet_type == 'item'){
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 15;
            $operation->operation_comment = 'За покупку пакета "'.$packet->packet_name_ru.'" Вы получаете '.$packet->packet_thing;
            $operation->save();
        }
        elseif($user_packet->user_packet_type == 'service'){
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 16;
            $operation->operation_comment = 'За покупку пакета "'.$packet->packet_name_ru.'" Вы получаете '.$packet->packet_lection;
            $operation->save();
        }

        //пополнение акционерного фонда
        $operation = new UserOperation();
        $operation->author_id = $user->user_id;
        $operation->money = $user_packet->packet_price / 10;
        $operation->operation_id = 1;
        $operation->fond_id = 2;
        $operation->operation_type_id = 5;
        $operation->operation_comment = 'За покупку пакета "'.$packet->packet_name_ru.'"';
        $operation->save();

        $fond = Fond::where('fond_id',2)->first();
        $fond->fond_money = $fond->fond_money + $packet->packet_price / 10;
        $fond->save();

        if($user_packet->is_portfolio == 0){
            //спикерский доход

            $check_speaker = UserPacket::where('is_portfolio',0)->where('is_active',1)->where('user_id',$user->user_id)->count();

            if($check_speaker <= 1){
                $speaker = Users::where('user_id',$user->speaker_id)->where('is_activated',1)->first();
                if($speaker != null && $speaker->is_speaker == 1 && $speaker->is_activated == 1){

                    $speaker->user_money = $speaker->user_money + ($packet->packet_price * $packet->speaker_procent / 100);
                    $speaker->save();

                    $operation = new UserOperation();
                    $operation->author_id = $user->user_id;
                    $operation->recipient_id = $speaker->user_id;
                    $operation->money = $packet->packet_price * $packet->speaker_procent / 100;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 7;
                    $operation->operation_comment = 'Спикерский доход';
                    $operation->save();

                    $send_money = $send_money + $packet->packet_price * $packet->speaker_procent / 100;;
                }
            }

        }

        //пополнение фонда компании
        $company_money = $user_packet->packet_price - $send_money - ($user_packet->packet_price / 10);

        $operation = new UserOperation();
        $operation->author_id = $user_packet->user_id;
        $operation->recipient_id = 1;
        $operation->money = $company_money;
        $operation->operation_id = 1;
        $operation->operation_type_id = 6;
        $operation->operation_comment = 'За покупку пакета "'.$packet->packet_name_ru.'"';
        $operation->save();

        $company = Users::where('user_id',1)->first();
        $company->user_money = $company->user_money + $company_money;
        $company->save();

        if($packet->packet_status_id > 0){
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;

            if($packet->packet_status_id == 1)
                $operation->operation_comment = 'Вы стали Клиентом';
            elseif($packet->packet_status_id == 2)
                $operation->operation_comment = 'Вы стали Агентом';
            elseif($packet->packet_status_id == 3)
                $operation->operation_comment = 'Вы стали Менеджером';

            $operation->save();

            $user->status_id = $packet->packet_status_id;
            $user->save();
        }

        //стать спикером
        $check_count = Users::where('recommend_user_id',$user->recommend_user_id)->where('status_id','>',1)->count();

        if($check_count > 4){
            $parent = Users::where('user_id', $user->recommend_user_id)->first();

            if($parent->status_id > 1 && $parent->is_speaker == 0) {
                $parent->is_speaker = 1;
                $parent->save();

                $operation = new UserOperation();
                $operation->author_id = null;
                $operation->recipient_id = $parent->user_id;
                $operation->money = null;
                $operation->operation_id = 1;
                $operation->operation_type_id = 10;
                $operation->operation_comment = 'Вы стали Спикером';
                $operation->save();
            }
        }
        
        $check = false;
        $child_user = $user;
        
        while($check != true){
            $parent_user = Users::where('user_id',$child_user->parent_id)->first();
            if($parent_user == null){
                $check = true;
                break;
            }
            else {
                if($parent_user->is_activated == 1 && $parent_user->status_id > 0){
                    if($child_user->is_left_part == 1)
                        $parent_user->left_child_profit += $user_packet->packet_price;
                    else $parent_user->right_child_profit += $user_packet->packet_price;

                    $parent_user->save();
                }
                $child_user = $parent_user;
            }
        }
    }
}
