<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\Fond;
use App\Models\GAP;
use App\Models\Operation;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\UserStatus;
use DB;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use URL;
use View;

class PacketController extends Controller
{
    public $sentMoney = 0;

    public function __construct()
    {
        $this->middleware('profile', ['except' => ['AcceptUserPacketPayBox', 'implementPacketBonuses']]);
        $this->middleware('admin', ['only' => ['inactiveUserPacket', 'activeUserPacket', 'deleteInactiveUserPacket', 'acceptInactiveUserPacket']]);
    }

    public function getPacketById($id)
    {
        $packet = Packet::find($id);
        $result['status'] = false;
        $result['title'] = $packet->packet_name_ru;
        $result['desc'] = $packet->packet_desc_ru;
        $result['image'] = '<a class="fancybox" href="' . $packet->packet_image . '">
                                     <img src="' . $packet->packet_image . '" style="width:100%">
                                 </a>';
        return response()->json($result);
    }

    public function activeUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users', 'users.user_id', '=', 'user_packet.user_id')
            ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
            ->leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->leftJoin('country', 'country.country_id', '=', 'city.country_id')
            ->where('user_packet.is_active', 1)
            ->orderBy('user_packet.user_packet_id', 'desc')
            ->select('users.*', 'user_packet.*', 'packet.*', 'city.*', 'country.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if (isset($request->user_name) && $request->user_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->packet_name) && $request->packet_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%');
            });

        if (isset($request->date_from) && $request->date_from != '') {
            $timestamp = strtotime($request->date_from);
            $row->where(function ($query) use ($timestamp) {
                $query->where('user_packet.created_at', '>=', date("Y-m-d H:i", $timestamp));
            });
        }

        if (isset($request->date_to) && $request->date_to != '') {
            $timestamp = strtotime($request->date_to);
            $row->where(function ($query) use ($timestamp) {
                $query->where('user_packet.created_at', '<=', date("Y-m-d H:i", $timestamp));
            });
        }

        $row = $row->paginate(10);

        return view('admin.active-user-packet.packet', [
            'row' => $row,
            'request' => $request
        ]);
    }

    public function inactiveUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users', 'users.user_id', '=', 'user_packet.user_id')
            ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
            ->where('user_packet.is_active', 0)
            ->orderBy('user_packet.user_packet_id', 'desc')
            ->select('users.*', 'user_packet.*', 'packet.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if (isset($request->user_name) && $request->user_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->packet_name) && $request->packet_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%');
            });

        $row = $row->paginate(10);

        return view('admin.inactive-user-packet.packet', [
            'row' => $row,
            'request' => $request
        ]);
    }

    public function sendResponseAddPacket(Request $request)
    {
        $packet = Packet::where('packet_id', $request->packet_id)->first();
        if ($packet == null) {
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        if (in_array($packet->packet_id, Packet::actualPassivePackets())) {
            $hasPassivePacket = UserPacket::whereIn('packet_id', Packet::actualPassivePackets())
                ->where(['user_id' => Auth::user()->user_id])->count();
            if ($hasPassivePacket) {

                $result['message'] = 'Вы можете приобрести пассивный пакет только один раз!!!';
                $result['status'] = false;
                return response()->json($result);
            }
        }

        if ($packet->condition_minimum_status_id > 0) {

            $status = UserStatus::where('user_status_id', Auth::user()->status_id)->first();
            $status_condition = UserStatus::where('user_status_id', $packet->condition_minimum_status_id)->first();

            if ($status == null || $status->sort_num < $status_condition->sort_num) {
                $result['message'] = 'У вас должно быть статус - ' . $status_condition->user_status_name . " и выше";
                $result['status'] = false;
                return response()->json($result);
            }
        }

        if (in_array($packet->is_upgrade_packet, [1, 3])) {
            $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                ->where('user_id', Auth::user()->user_id)
                ->where('user_packet.is_active', '=', '0')
                ->where('upgrade_type', '=', $packet->upgrade_type)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            if ($request->packet_id >= Packet::CLASSIC && !in_array($request->packet_id, [
                    Packet::GAP,
                    Packet::GAPTechno,
                    Packet::GAPAuto,
                    Packet::GAPHome
                ])) {
                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_packet.user_id', Auth::user()->user_id)
                    ->whereNotIn('user_packet.packet_id', [Packet::GAP, Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])
                    ->where('user_packet.packet_id', '>=', $request->packet_id)
                    ->where('user_packet.is_active', 1)
                    ->count();

                if ($is_check) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }
            }

            $packet_old_price = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                ->where('user_packet.user_id', Auth::user()->user_id)
                ->where('user_packet.is_active', 1)
                ->sum('user_packet.packet_price');
        }

        $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();
        if ($is_check > 0) {
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }

        $userPackets = UserPacket::whereIn('packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2])
            ->where(['user_id' => Auth::user()->user_id])
            ->pluck('packet_id')->toArray();

        if ($packet->packet_id == Packet::GAP && !in_array(Packet::VIP2, $userPackets)) {
            $result['message'] = 'Для получение пакета GAP, необходимо иметь пакет VIP';
            $result['status'] = false;
            return response()->json($result);
        }

        if (in_array($packet->packet_id, [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome]) && empty($userPackets)) {
            $result['message'] = 'Для получение пакета ' . $packet->packet_name_ru . ', необходимо иметь один из пакетов CLASSIC, PREMIUM, ELITE, VIP.';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::where('packet_id', $request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price;
        $user_packet->is_active = 0;
        $user_packet->is_portfolio = $packet->is_portfolio;
        $user_packet->save();

        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function buyPacketFromBalance(Request $request)
    {
        $packet = Packet::where('packet_id', $request->packet_id)->first();
        if ($packet == null) {
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }
        $packet_old_price = 0;

        if (in_array($packet->packet_id, Packet::actualPassivePackets())) {
            $hasPassivePacket = UserPacket::whereIn('packet_id', Packet::actualPassivePackets())
                ->where(['user_id' => Auth::user()->user_id])->count();
            if ($hasPassivePacket) {
                $result['message'] = 'Вы можете приобрести пассивный пакет только один раз!!!';
                $result['status'] = false;
                return response()->json($result);
            }
        }

        if (in_array($packet->is_upgrade_packet, [1, 3])) {
            $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                ->where('user_id', Auth::user()->user_id)
                ->where('is_active', '=', '0')
                ->where('upgrade_type', '=', $packet->upgrade_type)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            if ($request->packet_id >= Packet::CLASSIC && !in_array($request->packet_id, [
                    Packet::GAP,
                    Packet::GAPTechno,
                    Packet::GAPAuto,
                    Packet::GAPHome
                ])) {
                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_packet.user_id', Auth::user()->user_id)
                    ->whereNotIn('user_packet.packet_id', [Packet::GAP, Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])
                    ->where('user_packet.packet_id', '>=', $request->packet_id)
                    ->where('user_packet.is_active', 1)
                    ->count();


                if ($is_check) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }
            }

            if (in_array($packet->packet_id, [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])) {
                $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id, true);
            } elseif (in_array($packet->packet_id, [Packet::CLASSIC, Packet::PREMIUM, Packet::VIP2])) {
                $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id, false);
            }

        }


        $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();
        if ($is_check > 0) {
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }

        $userPackets = UserPacket::whereIn('packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2])
            ->where(['user_id' => Auth::user()->user_id])
            ->pluck('packet_id')->toArray();
        if ($packet->packet_id == Packet::GAP && !in_array(Packet::VIP2, $userPackets)) {
            $result['message'] = 'Для получение пакета GAP, необходимо иметь пакет VIP';
            $result['status'] = false;
            return response()->json($result);
        }

        if (in_array($packet->packet_id, [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome]) && empty($userPackets)) {
            $result['message'] = 'Для получение пакета ' . $packet->packet_name_ru . ', необходимо иметь один из пакетов CLASSIC, PREMIUM, VIP.';
            $result['status'] = false;
            return response()->json($result);
        }

        if ($packet->packet_id == Packet::GAP) {
            if (Auth::user()->user_money < $packet->packet_price) {
                $result['message'] = 'У вас не хватает баланса чтобы купить этот пакет';
                $result['status'] = false;
                return response()->json($result);
            }
        } else {
            if (Auth::user()->user_money < $packet->packet_price - $packet_old_price) {
                $result['message'] = 'У вас не хватает баланса чтобы купить этот пакет';
                $result['status'] = false;
                return response()->json($result);
            }
        }


        $packet = Packet::where('packet_id', $request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price;
        $user_packet->is_active = 0;
        $user_packet->is_portfolio = $packet->is_portfolio;
        $user_packet->save();

        $operation = new UserOperation();
        $operation->author_id = Auth::user()->user_id;
        $operation->recipient_id = null;
        $operation->money = $packet->packet_id == Packet::GAP ? $packet->packet_price : $packet->packet_price - $packet_old_price;
        $operation->operation_id = 2;
        $operation->operation_type_id = 30;
        $operation->operation_comment = $request->comment;
        $operation->save();

        $users = Users::find(Auth::user()->user_id);
        if ($packet->packet_id == Packet::GAP) {
            $rest_mooney = $users->user_money - $packet->packet_price;
        } else {
            $rest_mooney = $users->user_money - ($packet->packet_price - $packet_old_price);
        }
        $users->user_money = $rest_mooney;
        $users->save();

        $isImplementPacketBonus = $this->implementPacketBonuses($user_packet->user_packet_id, true);

        $result['message'] = 'Вы успешно купили пакет';
        $result['result'] = $isImplementPacketBonus;
        $result['status'] = true;
        return response()->json($result);
    }

    public function cancelResponsePacket(Request $request)
    {
        $is_check = UserPacket::where('user_id', Auth::user()->user_id)
            ->where('packet_id', $request->packet_id)
            ->where('is_active', 0)
            ->first();

        if ($is_check == null) {
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
        try {
            $this->implementPacketBonuses($request->packet_id, (int)$request->give_bonus);
        } catch (\Exception $e) {
            var_dump($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
        }


        $result['message'] = 'Вы успешно приняли запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function generatePayBoxCode(Request $request)
    {
        $packet = Packet::where('packet_id', $request->packet_id)->first();
        if ($packet == null) {
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }


        $packet_old_price = 0;
        if ($packet->condition_minimum_status_id > 0) {

            $status = UserStatus::where('user_status_id', Auth::user()->status_id)->first();
            $status_condition = UserStatus::where('user_status_id', $packet->condition_minimum_status_id)->first();

            if ($status == null || $status->sort_num < $status_condition->sort_num) {
                $result['message'] = 'У вас должно быть статус - ' . $status_condition->user_status_name . " и выше";
                $result['status'] = false;
                return response()->json($result);
            }
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


        $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();
        if ($is_check > 0) {
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }


        $packet = Packet::where('packet_id', $request->packet_id)->first();

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

            $currency = Currency::where('currency_name', 'тенге')->first();

            /* Обязательные параметры */
            $arrReq['pg_merchant_id'] = 500436;// Идентификатор магазина
            $arrReq['pg_order_id'] = $user_packet->user_packet_id;        // Идентификатор заказа в системе магазина
            $arrReq['pg_amount'] = $user_packet->packet_price * $currency->money;        // Сумма заказа
            $arrReq['pg_result_url'] = URL('/') . "/admin/packet/paybox/success/" . $user_packet->user_packet_id;
            $arrReq['pg_success_url'] = URL('/') . "/admin/packet/paybox/success/" . $user_packet->user_packet_id;
            $arrReq['pg_failure_url'] = URL('/') . "/admin/shop?error=Ошибка";
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
        } catch (Exception $ex) {
            $result['message'] = 'Ошибка база данных';
            $result['status'] = false;
            return response()->json($result);
        }


        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function acceptUserPacketPaybox(Request $request, $user_packet_id)
    {
        if (isset($request->pg_result) && $request->pg_result == 1) {
            $this->implementPacketBonuses($user_packet_id);
            return redirect('/admin/index?message=Вы успешно купили пакет');
        }
    }


    public function implementPacketBonuses($userPacketId, $give_bonus = null)
    {
        $inviter_order = 1;
        $userPacket = UserPacket::find($userPacketId);
        $actualStatuses = [UserStatus::CONSULTANT, UserStatus::PREMIUM_MANAGER, UserStatus::ELITE_MANAGER,
            UserStatus::VIP_MANAGER, UserStatus::BRONZE_MANAGER, UserStatus::SILVER_MANAGER, UserStatus::GOLD_MANAGER, UserStatus::RUBIN_DIRECTOR,
            UserStatus::SAPPHIRE_DIRECTOR, UserStatus::EMERALD_DIRECTOR, UserStatus::DIAMOND_DIRECTOR, UserStatus::PASSIV,
            UserStatus::ACTIV_1, UserStatus::ACTIV_2, UserStatus::ACTIV_3];

        if (!$userPacket) {
            $result['message'] = 'Ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::where(['packet_id' => $userPacket->packet_id])->first();
        $user = Users::where(['user_id' => $userPacket->user_id])->first();

        if (!$packet || !$user) {
            $result['message'] = 'Ошибка, пользователь, пригласитель или пакет был не найден!';
            $result['status'] = false;
            return response()->json($result);
        }
        $isNotGap = !in_array($packet->packet_id, [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome, Packet::GAP]);
        $isPassivePackets = in_array($packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR,
            Packet::TULPAR_PLUS
        ]);


        if (!$isNotGap || $isPassivePackets) {
            $this->implementGap($userPacket, $isPassivePackets, $give_bonus);
        }

        $this->activatePackage($userPacket, $give_bonus, !$isNotGap);


        if ($user->user_id != 1 && $give_bonus && $isNotGap) {
            $this->implementInviterBonus($userPacket, $packet, $user);
            $this->implementOfficeBonus($userPacket, $packet, $user);
            $this->implementSpeakerBonus($userPacket, $packet, $user);
        }
        $inviter = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();

        while ($inviter && $give_bonus && $isNotGap) {
            if ($inviter->is_activated) {
                $bonus = 0;
                $packetPrice = $userPacket->packet_price;
                if (in_array($packet->packet_id, [Packet::JASTAR, Packet::QAMQOR, Packet::JAS_OTAU, Packet::QOLDAU])) {
                    $packetPrice = $packetPrice / 2;
                } elseif (in_array($packet->packet_id, [Packet::BASPANA_PLUS, Packet::BASPANA, Packet::TULPAR_PLUS, Packet::TULPAR])) {
                    $packetPrice = $packetPrice * (37.5 / 100);
                }


                $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
                $inviterCount = (count($inviterPacketId));
                $limit = Packet::limitBonus($inviter);

                if ($inviterCount) {
                    if ($limit['success']) {
                        $inviterPacketId = collect($inviterPacketId);
                        $inviterPacketId = $inviterPacketId->map(function ($item) {
                            return $item->packet_id;
                        });
                        $inviterPacketId = max($inviterPacketId->all());
                        $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;
                        if ($inviter_order == 1
                            && in_array($inviter->status_id, $actualStatuses)) {
                            $bonusPercentage = (5 / 100);
                            $bonus = $packetPrice * $bonusPercentage;
                        } elseif (!in_array($packet->packet_id, [Packet::GAP, Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])) {
                            if (($inviter_order >= 2 || $inviter_order <= 8) && $this->hasNeedPackets($packet->packet_id, $inviterPacketId, $inviter_order)) {
                                $bonusPercentage = (5 / 100);
                                $bonus = $packetPrice * $bonusPercentage;
                            }
                        }
                    }
                }
                if ($bonus) {
                    $operation = new UserOperation();
                    $operation->author_id = $user->user_id;
                    $operation->recipient_id = $inviter->user_id;
                    $operation->money = $bonus;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 1;
                    $operation->operation_comment = 'Структурный бонус. "' . $packet->packet_name_ru . '". Уровень - ' . $inviter_order;
                    $operation->save();
                    $inviter->user_money = $inviter->user_money + $bonus;
                    $inviter->save();
                    $this->sentMoney += $bonus;
                }
            }

            $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
            if (!$inviter || $inviter_order >= 8) {
                break;
            }

            $inviter_order++;
        }


        if ($isNotGap) {
            $this->implementPacketThings($packet, $user, $userPacket, $give_bonus);
            $this->qualificationUp($packet, $user);
        }
    }

    public function implementGap($userPacket, $isPassivePacket, $give_bonus)
    {

        try {
            if (!$isPassivePacket && $give_bonus) {
                app(GAPController::class)->send_personal_sv($userPacket);
            }
            if ($give_bonus) {
                app(GAPController::class)->send_group_sv($userPacket);
                app(GAPController::class)->give_bonus($userPacket);
            }
            app(GAPController::class)->give_status($userPacket);
        } catch (\Exception $exception) {
            $userPacket->is_active = false;
            var_dump($exception->getMessage() . ' / ' . $exception->getFile() . ' / ' . $exception->getLine());
        }
    }

    private function implementOfficeBonus($userPacket, $packet, $user)
    {

        $isPassivePackets = in_array($packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR,
            Packet::TULPAR_PLUS
        ]);

        $userPacketCount = UserPacket::where('user_id', $user->user_id)->where('is_active', 1)->count();
        if ($user->office_director_id && $packet->packet_id != Packet::GAP) {
            $bonus = 0;
            $bonusPercentage = 0;
            if ($isPassivePackets){
                $packetPrice = $userPacket->packet_price * (37.5/100);
            }
            else{
                $packetPrice = $userPacket->packet_price;
            }
            $office_director = Users::where(['user_id' => $user->office_director_id])->first();

            if ($office_director) {
                $bonusPercentage = (3 / 100);
                $bonus = $packetPrice * $bonusPercentage;
            }

            if ($bonus) {
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->recipient_id = $office_director->user_id;
                $operation->money = $bonus;
                $operation->operation_id = 1;
                $operation->operation_type_id = 8;
                $operation->operation_comment = 'Офисный бонус';
                $operation->save();

                $office_director->user_money = $office_director->user_money + $bonus;
                $office_director->save();

                $this->sentMoney += $bonus;
            }
        }
    }

    private function implementSpeakerBonus($userPacket, $packet, $user)
    {

        $isPassivePackets = in_array($packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR,
            Packet::TULPAR_PLUS
        ]);
        $userPacketCount = UserPacket::where('user_id', $user->user_id)->where('is_active', 1)->count();
        if ($userPacketCount <= 1 && $user->speaker_id && $packet->packet_id != Packet::GAP) {
            $bonus = 0;
            $bonusPercentage = 0;
            if ($isPassivePackets){
                $packetPrice = $userPacket->packet_price * (37.5/100);
            }
            else{
                $packetPrice = $userPacket->packet_price;
            }
            $speaker = Users::where(['user_id' => $user->speaker_id])->first();
            if ($speaker) {
                $bonusPercentage = (2 / 100);
                $bonus = $packetPrice * $bonusPercentage;
            }

            if ($bonus) {
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->recipient_id = $speaker->user_id;
                $operation->money = $bonus;
                $operation->operation_id = 1;
                $operation->operation_type_id = 7;
                $operation->operation_comment = 'Спикерский бонус';
                $operation->save();

                $speaker->user_money = $speaker->user_money + $bonus;
                $speaker->save();

                $this->sentMoney += $bonus;
            }
        }
    }

    private function implementInviterBonus($userPacket, $packet, $user)
    {
        $isPassivePackets = in_array($packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR,
            Packet::TULPAR_PLUS
        ]);


        if ($user->inviter_user_id) {
            $inviter = Users::where(['user_id' => $user->inviter_user_id])->where('is_activated', '=', true)->first();
        } else {
            $inviter = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();
        }
        $bonus = 0;
        $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
        $inviterCount = (count($inviterPacketId));

        if ($inviterCount) {
            $inviterPacketId = collect($inviterPacketId);
            $inviterPacketId = $inviterPacketId->map(function ($item) {
                return $item->packet_id;
            });
            $inviterPacketId = max($inviterPacketId->all());
            $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;

            $bonusPercentage = (15 / 100);
            $bonus = $packetPrice * $bonusPercentage;
        }
        if ($bonus) {
            $operation = new UserOperation();
            $operation->author_id = $user->user_id;
            $operation->recipient_id = $inviter->user_id;
            $operation->money = $bonus;
            $operation->operation_id = 1;
            $operation->operation_type_id = 1;
            $operation->operation_comment = 'Рекрутинговый бонус. "' . $packet->packet_name_ru . '".';
            $operation->save();

            $inviter->user_money = $inviter->user_money + $bonus;
            $inviter->save();

            $this->sentMoney += $bonus;
        }
    }

    private function activatePackage($userPacket, $give_bonus = null, $isGap = false)
    {
        $packet_old_price = 0;

        if ($userPacket == null || $userPacket->is_active == 1) {
            $result['message'] = 'ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::find($userPacket->packet_id);

        if ($packet->is_upgrade_packet) {
            $packet_old_price = UserPacket::beforePurchaseSum($userPacket->user_id, $isGap);
        }

        $total_price = $userPacket->packet_price - $packet_old_price;
        $userPacket->is_active = 1;
        $userPacket->activated_at = date('Y-m-d H:i:s');

        $isPassivePacket = in_array($userPacket->packet_id, [
                Packet::JASTAR,
                Packet::QAMQOR,
                Packet::JAS_OTAU,
                Packet::QOLDAU,
                Packet::BASPANA_PLUS,
                Packet::BASPANA,
                Packet::TULPAR_PLUS,
                Packet::TULPAR]
        );

        if ($userPacket->packet_id == Packet::GAP || $isPassivePacket) {
            $userPacket->packet_price = $userPacket->packet_price;
        } else {
            $userPacket->packet_price = $total_price;
        }

        if (!in_array($userPacket->packet_id, [
                Packet::GAP,
                Packet::GAPHome,
                Packet::GAPTechno,
                Packet::GAPAuto]) && $give_bonus) {
            $this->pv_to_gv($userPacket, $userPacket->packet_price);
        }

        $max_queue_start_position = UserPacket::where('packet_id', $userPacket->packet_id)->where('is_active', 1)->where('queue_start_position', '>', 0)->max('queue_start_position');
        $userPacket->queue_start_position = ($max_queue_start_position) ? ($max_queue_start_position + 1) : 1;


        if ($userPacket->save()) {
            if (!in_array($userPacket->packet_id, [
                    Packet::GAP,
                    Packet::GAPTechno,
                    Packet::GAPAuto,
                    Packet::GAPHome
                ]) && !in_array($userPacket->packet_id, Packet::actualPassivePackets()) && $give_bonus) {
                $this->add_share_to_global_diamond_found($userPacket, $userPacket->user_id);
                $user = Users::find($userPacket->user_id);
                $user->product_balance = $user->product_balance + $userPacket->packet_price;
                $user->save();
            }
        }
    }

    public function pv_to_gv($user_packet, $final_price)
    {
        $packet = Packet::where(['packet_id' => $user_packet->packet_id])->first();
        $isPassivePacket = in_array($packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR_PLUS,
            Packet::TULPAR,
        ]);

        if ($isPassivePacket) {
            if (in_array($packet->packet_id, [Packet::JASTAR, Packet::QAMQOR, Packet::JAS_OTAU, Packet::QOLDAU])) {
                $final_price = $packet->packet_price / 2;
            } elseif (in_array($packet->packet_id, [Packet::BASPANA_PLUS, Packet::BASPANA, Packet::TULPAR_PLUS, Packet::TULPAR])) {
                $final_price = $packet->packet_price * (37.5 / 100);
            }
        }

        $final_price = $final_price * (500 / 600);
        $final_price = round($final_price, 0);

        $user_id = $user_packet->user_id;
        $user = Users::where(['user_id' => $user_id])->first();


        if (!$isPassivePacket) {
            // add pv to user
            $user->pv_balance = ($user->pv_balance + $final_price);
            if ($user->save()) {
                $user_operation = new UserOperation();
                $user_operation->operation_id = 1;
                $user_operation->money = $final_price;
                $user_operation->author_id = $user->user_id;
                $user_operation->recipient_id = $user->user_id;
                $user_operation->operation_type_id = 40;
                $user_operation->operation_comment = sprintf('Личный объем  в размере %s pv.', $final_price);
                $user_operation->save();
            }
            $this->checkForPremium($user->user_id);
        }

        // add gv to parents
        $parent = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();
        $counter = 1;

        while ($parent) {
            $userPacket = UserPacket::where('user_id', '=', $parent->user_id)->where('is_active', '=', true)->count();
            if ($parent->is_activated && $userPacket > 0) {
                $parent->gv_balance = $parent->gv_balance + $final_price;
                if ($parent->save()) {
                    $user_operation = new UserOperation();
                    $user_operation->operation_id = 1;
                    $user_operation->money = $final_price;
                    $user_operation->author_id = $user->user_id;
                    $user_operation->recipient_id = $parent->user_id;
                    $user_operation->operation_type_id = 11;
                    $user_operation->operation_comment = sprintf('Групповой объем в размере %s gv уровень - %s', $final_price, $counter);
                    $user_operation->save();
                }
                $this->checkForPremium($parent->user_id);
            }

            $parent = Users::where(['user_id' => $parent->recommend_user_id])->where('is_activated', '=', true)->first();

            $counter++;
            if ($counter >= 9) {
                break;
            }
        }
    }

    public function checkForPremium($user_id)
    {
        $user = Users::where(['user_id' => $user_id])->first();

        // check for bronze status
        $check_pv = $user->pv_balance >= 50;
        $satisfy_gv_balance = 100;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);
        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::BRONZE_MANAGER;
        }

        //check for silver status
        $check_pv = $user->pv_balance >= 100;
        $satisfy_gv_balance = 300;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::SILVER_MANAGER;
        }


        //check for gold status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 900;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::GOLD_MANAGER;
        }


        //check for platinum status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 2700;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::PLATINUM_MANAGER;
        }


        //check for rubin status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 8100;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::RUBIN_DIRECTOR;
        }


        //check for sapphire status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 24300;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::SAPPHIRE_DIRECTOR;
        }


        // check for emerald status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 72900;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::EMERALD_DIRECTOR;
        }


        // check for diamond status
        $check_pv = $user->pv_balance >= 150;
        $satisfy_gv_balance = 218700;
        $enough_child_gv = $this->check_child($user_id, $satisfy_gv_balance);

        if ($check_pv && $enough_child_gv) {
            $last_status = UserStatus::DIAMOND_DIRECTOR;
        }

        $premium_money = 0;
        if (isset($last_status)) {
            if ($last_status == UserStatus::BRONZE_MANAGER) {
                $premium_money = 30;
            } elseif ($last_status == UserStatus::SILVER_MANAGER) {
                $premium_money = 60;
            } elseif ($last_status == UserStatus::GOLD_MANAGER) {
                $premium_money = 180;
            } elseif ($last_status == UserStatus::PLATINUM_MANAGER) {
                $premium_money = 420;
            } elseif ($last_status == UserStatus::RUBIN_DIRECTOR) {
                $premium_money = 1400;
            } elseif ($last_status == UserStatus::SAPPHIRE_DIRECTOR) {
                $premium_money = 4200;
            } elseif ($last_status == UserStatus::EMERALD_DIRECTOR) {
                $premium_money = 14000;
            } elseif ($last_status == UserStatus::DIAMOND_DIRECTOR) {
                $premium_money = 42000;
            }

            if (isset($premium_money) && $user->status_id < $last_status) {
                $user->status_id = $last_status;
                $user->user_money = $user->user_money + $premium_money;
                if ($user->save()) {
                    $user_operation = new UserOperation();
                    $user_operation->operation_id = 1;
                    $user_operation->money = $premium_money;
                    $user_operation->author_id = null;
                    $user_operation->recipient_id = $user_id;
                    $user_operation->created_at = date('Y-m-d H:i:s');
                    $user_operation->operation_type_id = 41;
                    $user_operation->operation_comment = sprintf('Поздравляем!! Вы закрыли статус %s и получили квалификационный бонус %s тенге!', UserStatus::getStatusName($last_status), $premium_money * 500);
                    $user_operation->save();
                }
            }
        }

    }

    public
    function check_child($user_id, $satisfy_gv_balance)
    {
        $child = Users::where(['recommend_user_id' => $user_id])->get();
        $counter = 0;
        foreach ($child as $user) {
            if (($user->gv_balance + $user->pv_balance) >= $satisfy_gv_balance) {
                $counter++;
            }
        }
        if ($counter >= 3) {
            return true;
        }
        return false;
    }

    public
    function add_share_to_global_diamond_found($userPacket, $user_id)
    {
        $toGlobalFound = $userPacket->packet_price * (5 / 100);
        $fond = Fond::where(['fond_id' => Fond::GLOBAL_DIAMOND_FOUND])->first();
        $fond->fond_money = $fond->fond_money + $toGlobalFound;
        if ($fond->save()) {
            $operation = new UserOperation();
            $operation->author_id = $user_id;
            $operation->recipient_id = 1;
            $operation->money = $toGlobalFound;
            $operation->operation_id = 1;
            $operation->operation_type_id = Operation::RefillGlobalDiamondFound;
            $operation->operation_comment = 'Пополнение фонда Global Diamond Found на ' . $toGlobalFound . 'pv';
            $operation->save();
        }
        $this->sentMoney += $toGlobalFound;
    }

    private
    function implementPacketThings($packet, $user, $userPacket, $give_bonus)
    {
        if ($userPacket->user_packet_type == 'item' && $packet->packet_type == 1 && $userPacket->packet_id != Packet::GAP) {
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 15;
            $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '" Вы получаете ' . $packet->packet_thing;
            $operation->save();
        } elseif ($userPacket->user_packet_type == 'service' && $packet->packet_type == 1 && $userPacket->packet_id != Packet::GAP) {
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 16;
            $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '" Вы получаете ' . $packet->packet_lection;
            $operation->save();
        }

        //пополнение фонда компании
        if ($give_bonus) {
            $company_money = $userPacket->packet_price - $this->sentMoney;
            $operation = new UserOperation();
            $operation->author_id = $userPacket->user_id;
            $operation->recipient_id = 1;
            $operation->money = $company_money;
            $operation->operation_id = 1;
            $operation->operation_type_id = 6;
            $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
            $operation->save();

            $company = Users::where('user_id', 1)->first();
            $company->user_money = $company->user_money + $company_money;
            $company->save();
        }
    }

    private
    function implementQualificationBonuses($packet, $user, $userPacket)
    {

        $inviterOrder = 1;
        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2, Packet::GAP2, Packet::GAP1];
        $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();
        $userPacketPrice = $userPacket->packet_price;

        while ($inviter) {
            if ($inviterOrder > 5) {
                $bonus = 0;

                if ($inviterOrder == 6 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::VIP_MANAGER) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                } elseif ($inviterOrder == 7 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::GOLD_MANAGER) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                } elseif ($inviterOrder == 8 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::RUBIN_DIRECTOR) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                } elseif ($inviterOrder == 9 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::SAPPHIRE_DIRECTOR) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                } elseif ($inviterOrder == 10 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::EMERALD_DIRECTOR) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                } elseif ($inviterOrder == 10 && in_array($packet->packet_id, $actualPackets) && $inviter->status_id >= UserStatus::DIAMOND_DIRECTOR) {
                    $bonusPercentage = (1 / 100);
                    $bonus = $userPacketPrice * $bonusPercentage;
                }

                if ($bonus) {
                    $operation = new UserOperation();
                    $operation->author_id = $user->user_id;
                    $operation->recipient_id = $inviter->user_id;
                    $operation->money = $bonus;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 1;
                    $operation->operation_comment = 'КВАЛИФИКАЦИОННЫЙ БОНУС. "' . $packet->packet_name_ru . '". Уровень - ' . $inviterOrder;
                    $operation->save();
                    $inviter->user_money = $inviter->user_money + $bonus;
                    $inviter->save();
                    $this->sentMoney += $bonus;
                }
            }

            $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
            if (!$inviter || $inviterOrder >= 10) {
                break;
            }
            $inviterOrder += 1;
        }
    }

    private
    function qualificationUp($packet, $user)
    {
        $willUpdate = false;
        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::VIP2];
        if (in_array($packet->packet_id, $actualPackets)) {

            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;


            if ($packet->packet_status_id == UserStatus::CONSULTANT)
                $operation->operation_comment = 'Ваш статус Консультант';
            elseif ($packet->packet_status_id == UserStatus::PREMIUM_MANAGER)
                $operation->operation_comment = 'Ваш статус Premium Менеджер';
            elseif ($packet->packet_status_id == UserStatus::VIP_MANAGER)
                $operation->operation_comment = 'Ваш статус VIP Менеджер';

            $operation->save();
            $user->status_id = $packet->packet_status_id;
            $user->save();
        }
    }

    public
    function hasNeedPackets($packetId, $inviterPacketId, $order)
    {
        if (in_array($packetId, Packet::actualPassivePackets())) {
            return true;
        }

        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2];
        $boolean = false;
        $inviterPacket = Packet::where(['packet_id' => $inviterPacketId])->first();
        $packet_available_level = $inviterPacket->packet_available_level;
        if ($packetId <= $inviterPacketId && in_array($packetId, $actualPackets) && $order <= $packet_available_level) {
            $boolean = true;
        }
        return $boolean;
    }
}
