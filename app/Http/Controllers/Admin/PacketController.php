<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\Fond;
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
        $this->middleware('profile', ['except' => ['AcceptUserPacketPayBox', 'acceptPacketFunction', 'implementPacketBonuses']]);
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

            if ($request->packet_id > 2) {
                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_packet.user_id', Auth::user()->user_id)
                    ->where('user_packet.packet_id', '>=', $request->packet_id)
                    ->where('upgrade_type', '=', $packet->upgrade_type)
                    ->where('user_packet.is_active', 1)
                    ->count();

                if ($is_check > 0) {
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

            if ($request->packet_id > 2) {
                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_packet.user_id', Auth::user()->user_id)
                    ->where('user_packet.packet_id', '>=', $request->packet_id)
                    ->where('upgrade_type', '=', $packet->upgrade_type)
                    ->where('user_packet.is_active', 1)
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
        if ($packet->packet_id == Packet::GAP) {
            if (Auth::user()->user_money < $packet->packet_price) {
                $result['message'] = 'У вас не хватает баланса чтобы купить этот пакет';
                $result['status'] = false;
                return response()->json($result);
            }
        }
        else {
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
            $rest_mooney =  $users->user_money - $packet->packet_price;
        }
        else {
            $rest_mooney =  $users->user_money - ($packet->packet_price - $packet_old_price);
        }
        $users->user_money = $rest_mooney;
        $users->save();

        $isImplementPacketBonus = $this->implementPacketBonuses($user_packet->user_packet_id);

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

        $isImplementPacketBonus = $this->implementPacketBonuses($request->packet_id);

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

//            $packet_old_price = UserPacket::where('user_id', Auth::user()->user_id)
//                ->where('packet_id', '>', 2)
//                ->where('is_active', 1)
//                ->where('user_packet.packet_id', '!=', 9)
//                ->where('is_portfolio', '=', $packet->is_portfolio)
//                ->sum('packet_price');

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


    public function implementPacketBonuses($userPacketId)
    {
        $inviter_order = 1;
        $userPacket = UserPacket::find($userPacketId);
        $actualStatuses = [UserStatus::CONSULTANT, UserStatus::PREMIUM_MANAGER, UserStatus::ELITE_MANAGER,
            UserStatus::VIP_MANAGER, UserStatus::BRONZE_MANAGER, UserStatus::SILVER_MANAGER, UserStatus::GOLD_MANAGER, UserStatus::RUBIN_DIRECTOR,
            UserStatus::SAPPHIRE_DIRECTOR, UserStatus::EMERALD_DIRECTOR, UserStatus::DIAMOND_DIRECTOR,
            UserStatus::FREE_ELITE_OWNER];

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
        
        $this->activatePackage($userPacket);
        $this->implementInviterBonus($userPacket, $packet, $user);
        $this->implementOfficeBonus($userPacket, $packet, $user);
        $this->implementSpeakerBonus($userPacket, $packet, $user);
        $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();

        while ($inviter) {
            $bonus = 0;
            $bonusPercentage = 0;
            $packetPrice = $userPacket->packet_price;
            $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
            $inviterCount = (count($inviterPacketId));

            if ($inviterCount) {
                $inviterPacketId = collect($inviterPacketId);
                $inviterPacketId = $inviterPacketId->map(function ($item) {
                    return $item->packet_id;
                });
                $inviterPacketId = max($inviterPacketId->all());
                $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;
                if ($inviter_order == 1
                    && in_array($inviter->status_id, $actualStatuses)
                    && $packet->packet_id != Packet::ELITE_FREE) {
                    $bonusPercentage = (5 / 100);
                    $bonus = $packetPrice * $bonusPercentage;
                } elseif ($packet->packet_id != Packet::GAP) {
                    if (($inviter_order >= 2 || $inviter_order <= 8) && $this->hasNeedPackets($packet->packet_id, $inviterPacketId, $inviter_order))
                    {
                        $bonusPercentage = (5 / 100);
                        $bonus = $packetPrice * $bonusPercentage;
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
                $operation->operation_comment = 'Рекрутинговый бонус. "' . $packet->packet_name_ru . '". Уровень - ' . $inviter_order;
                $operation->save();

                $inviter->user_money = $inviter->user_money + $bonus;
                $inviter->save();

                $this->sentMoney += $bonus;
            }

//            echo '<pre>', var_dump($inviter_order . ' /  ' . $inviter->name . ' / ' . $inviter->user_id . ' / ' . $bonus . ' / ' . $inviterPacketId), '</pre>';
            $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
            if (!$inviter || $inviter_order >= 8) {
                break;
            }

            $inviter_order++;
        }

        $this->qualificationUp($packet, $user);

        // if ($user->status_id >= UserStatus::CONSULTANT) {
        //     $this->implementQualificationBonuses($packet, $user, $userPacket);
        // }

        $this->implementPacketThings($packet, $user, $userPacket);

    }

    private function implementOfficeBonus($userPacket, $packet, $user)
    {
        $userPacketCount = UserPacket::where('user_id', $user->user_id)->where('is_active', 1)->count();
        if ($user->office_director_id && $packet->packet_id != Packet::GAP) {
            $bonus = 0;
            $bonusPercentage = 0;
            $packetPrice = $userPacket->packet_price;
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
        $userPacketCount = UserPacket::where('user_id', $user->user_id)->where('is_active', 1)->count();
        if ($userPacketCount <= 1 && $user->speaker_id && $packet->packet_id != Packet::GAP) {
            $bonus = 0;
            $bonusPercentage = 0;
            $packetPrice = $userPacket->packet_price;
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
        if ($user->inviter_user_id) {
            $inviter = Users::where(['user_id' => $user->inviter_user_id])->first();
        }
        else {
            $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();
        }        
        $bonus = 0;
        $bonusPercentage = 0;
        $packetPrice = $userPacket->packet_price;
        $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
        $inviterCount = (count($inviterPacketId));

        if ($inviterCount) {
            $inviterPacketId = collect($inviterPacketId);
            $inviterPacketId = $inviterPacketId->map(function ($item) {
                return $item->packet_id;
            });
            $inviterPacketId = max($inviterPacketId->all());
            $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;
            if ($packet->packet_id != Packet::ELITE_FREE) {
                $bonusPercentage = (15 / 100);
                $bonus = $packetPrice * $bonusPercentage;       
            }
        }
        if ($bonus) {
            $operation = new UserOperation();
            $operation->author_id = $user->user_id;
            $operation->recipient_id = $inviter->user_id;
            $operation->money = $bonus;
            $operation->operation_id = 1;
            $operation->operation_type_id = 1;
            $operation->operation_comment = 'Кураторский бонус. "' . $packet->packet_name_ru . '".';
            $operation->save();

            $inviter->user_money = $inviter->user_money + $bonus;
            $inviter->save();

            $this->sentMoney += $bonus;
        }        
    }

    private function activatePackage($userPacket)
    {
        $packet_old_price = 0;

        if ($userPacket == null || $userPacket->is_active == 1) {
            $result['message'] = 'ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::find($userPacket->packet_id);

        if ($packet->is_upgrade_packet) {
            $packet_old_price = UserPacket::beforePurchaseSum($userPacket->user_id);
        }

        $userPacket->is_active = 1;
        if ($userPacket->packet_id == Packet::GAP) {
            $userPacket->packet_price = $userPacket->packet_price;    
        } 
        else {
            $userPacket->packet_price = $userPacket->packet_price - $packet_old_price;
        }
        $max_queue_start_position = UserPacket::where('packet_id', $userPacket->packet_id)->where('is_active', 1)->where('queue_start_position', '>', 0)->max('queue_start_position');
        $userPacket->queue_start_position = ($max_queue_start_position) ? ($max_queue_start_position + 1) : 1;
        if ($userPacket->save() && $userPacket->packet_id != Packet::ELITE_FREE && $userPacket->packet_id != Packet::GAP) {
            $this->add_share_to_global_diamond_found($userPacket, $userPacket->user_id);
        }
    }

    public function add_share_to_global_diamond_found($userPacket, $user_id)
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
    function implementPacketThings($packet, $user, $userPacket)
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

    private function implementQualificationBonuses($packet, $user, $userPacket)
    {

        $inviterOrder = 1;
        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2, Packet::VIP, Packet::GAP2, Packet::GAP1];
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
//                echo '<pre>', var_dump($inviterOrder . ' /  ' . $inviter->name . ' / ' . $inviter->user_id . ' / ' . $bonus . ' / статус' . $inviter->status_id), '</pre>';
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
        $actualPackets = [Packet::ELITE_FREE, Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2, Packet::VIP];
        if (in_array($packet->packet_id, $actualPackets)) {

            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;


            if ($packet->packet_status_id == UserStatus::CONSULTANT)
                $operation->operation_comment = 'Ваш статус Консультант';
            if ($packet->packet_status_id == UserStatus::FREE_ELITE_OWNER)
                $operation->operation_comment = 'Ваш статус владелец Elite free';
            elseif ($packet->packet_status_id == UserStatus::PREMIUM_MANAGER)
                $operation->operation_comment = 'Ваш статус Premium Менеджер';
            elseif ($packet->packet_status_id == UserStatus::ELITE_MANAGER)
                $operation->operation_comment = 'Ваш статус Elite Менеджер';
            elseif ($packet->packet_status_id == UserStatus::VIP_MANAGER)
                $operation->operation_comment = 'Ваш статус VIP Менеджер';            


            $operation->save();
            $user->status_id = $packet->packet_status_id;
            $user->save();


            $parentFollowers = Users::parentFollowers($user->recommend_user_id);
            $parent = Users::where('user_id', $user->recommend_user_id)->first();
            $needNumber = 3; // Necessary number of followers for update parent status
            if (count($parentFollowers) >= $needNumber) {
                $operation = new UserOperation();
                if ($parent->status_id >= UserStatus::PREMIUM_MANAGER && $user->status_id >= UserStatus::PREMIUM_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::PREMIUM_MANAGER)) {
                    $parent->status_id = UserStatus::BRONZE_MANAGER;
                    if (Packet::checkQualificationBonusTime($parent, 15)) {
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Бронзовый Менеджер \n Вы получите 15 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);
                    }
                    $operation->operation_comment = "Ваш статус Бронзовый Менеджер";
                    $willUpdate = true;
                }
                if ($parent->status_id == UserStatus::BRONZE_MANAGER && $user->status_id == UserStatus::BRONZE_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::BRONZE_MANAGER)) {
                    $parent->status_id = UserStatus::SILVER_MANAGER;
                    if (Packet::checkQualificationBonusTime($parent, 30)) {
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Серебряный Менеджер \n Вы получите 30 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                            
                    }
                    $operation->operation_comment = "Ваш статус Серебряный Менеджер";
                    $willUpdate = true;
                } elseif ($parent->status_id == UserStatus::SILVER_MANAGER && $user->status_id == UserStatus::SILVER_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::SILVER_MANAGER)) {
                    $parent->status_id = UserStatus::GOLD_MANAGER;
                    if (Packet::checkQualificationBonusTime($parent, 60)) {   
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Золотой Менеджер \n Вы получите Путевку в санатории \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                         
                    }
                    $operation->operation_comment = "Ваш статус Золотой Менеджер";
                    $willUpdate = true;
                } elseif ($parent->status_id == UserStatus::GOLD_MANAGER && $user->status_id == UserStatus::GOLD_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GOLD_MANAGER)) {
                    $parent->status_id = UserStatus::PLATINUM_MANAGER;
                    if (Packet::checkQualificationBonusTime($parent, 90)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Платиновый Менеджер \n Вы получите Путевка на 1 человека \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $operation->operation_comment = "Ваш статус Платиновый Менеджер";
                    $willUpdate = true;
                }elseif ($parent->status_id == UserStatus::PLATINUM_MANAGER && $user->status_id == UserStatus::PLATINUM_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::PLATINUM_MANAGER)) {
                    $parent->status_id = UserStatus::RUBIN_DIRECTOR;
                    if (Packet::checkQualificationBonusTime($parent, 120)) {      
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Рубиновый Менеджер \n Вы получите Круиз вокруг света \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                      
                    }
                    $operation->operation_comment = "Ваш статус Рубиновый Директор";
                    $willUpdate = true;
                } elseif ($parent->status_id == UserStatus::RUBIN_DIRECTOR && $user->status_id == UserStatus::RUBIN_DIRECTOR && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::RUBIN_DIRECTOR)) {
                    $parent->status_id = UserStatus::SAPPHIRE_DIRECTOR;
                    if (Packet::checkQualificationBonusTime($parent, 150)) {     
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Сапфировый Менеджер \n Вы получите Автомобиль Hyunday \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                       
                    }
                    $operation->operation_comment = "Ваш статус Сапфировый Директор";
                    $willUpdate = true;
                } elseif ($parent->status_id == UserStatus::SAPPHIRE_DIRECTOR && $user->status_id == UserStatus::SAPPHIRE_DIRECTOR && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::SAPPHIRE_DIRECTOR)) {
                    $parent->status_id = UserStatus::EMERALD_DIRECTOR;
                    if (Packet::checkQualificationBonusTime($parent, 180)) {    
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Изумрудный Менеджер \n Вы получите Загородный коттедж \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                        
                    }
                    $operation->operation_comment = "Ваш статус Изумрудный Директор";
                    $willUpdate = true;
                } elseif ($parent->status_id == UserStatus::EMERALD_DIRECTOR && $user->status_id == UserStatus::EMERALD_DIRECTOR && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::EMERALD_DIRECTOR)) {
                    $parent->status_id = UserStatus::DIAMOND_DIRECTOR;
                    if (Packet::checkQualificationBonusTime($parent, 210)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус Бриллиантовый Менеджер \n Вы получите Загородный коттедж \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $operation->operation_comment = "Ваш статус Бриллиантовый Директор";
                    $willUpdate = true;
                }

                if ($willUpdate = true) {
                    $operation->author_id = null;
                    $operation->recipient_id = $parent->user_id;
                    $operation->money = $operation->money ?? null;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 10;
                    $parent->save();
                    $operation->save();
                }

            }
        }
        else if ($packet->packet_id == Packet::GAP) {
            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;    
            $operation->operation_comment = 'Ваш статус GAP Менеджер';
            $operation->save();

            $user->soc_status_id = $packet->packet_status_id;
            $user->save();

            $parentFollowers = Users::parentFollowers($user->recommend_user_id);
            $parent = Users::where('user_id', $user->recommend_user_id)->first();
            $needNumber = 3; // Necessary number of followers for update parent status
            if (count($parentFollowers) >= $needNumber) {
                $operation = new UserOperation();
                if ($parent->soc_status_id == UserStatus::GAP_MANAGER && $user->soc_status_id == UserStatus::GAP_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP_MANAGER)) {                    
                    $parent->soc_status_id = UserStatus::GAP1_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 1ур";
                    $willUpdate = true;
                }
                if ($parent->soc_status_id == UserStatus::GAP1_MANAGER && $user->soc_status_id == UserStatus::GAP1_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP1_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 30)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 2ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP2_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 2ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP2_MANAGER && $user->soc_status_id == UserStatus::GAP2_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP2_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 60)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 2ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP3_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 3ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP3_MANAGER && $user->soc_status_id == UserStatus::GAP3_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP3_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 90)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 2ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP4_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 4ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP4_MANAGER && $user->soc_status_id == UserStatus::GAP4_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP4_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 120)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 2ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP5_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 5ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP5_MANAGER && $user->soc_status_id == UserStatus::GAP5_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP5_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 150)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 2ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP6_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 6ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP6_MANAGER && $user->soc_status_id == UserStatus::GAP6_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP6_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 180)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 7ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP7_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 7ур";
                    $willUpdate = true;
                } elseif ($parent->soc_status_id == UserStatus::GAP7_MANAGER && $user->soc_status_id == UserStatus::GAP7_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GAP7_MANAGER)) {
                    if (Packet::checkQualificationBonusTime($parent, 210)) {  
                        $ok = \App\Http\Helpers::send_mime_mail('info@roiclub.kz',
                        'info@roiclub.kz',
                        $parent->email,
                        $parent->email,
                        'windows-1251',
                        'UTF-8',
                        'Поздравляю вы повысили статус',
                        view('mail.qualification-email',['message' => "Ваш статус GAP Менеджер 8ур \n Вы получите 90 000 тг \n пожалуйста свяжитесь с нами! \n \n С уважением Qpartners.club"]),
                        true);                          
                    }
                    $parent->soc_status_id = UserStatus::GAP8_MANAGER;
                    $operation->operation_comment = "Ваш статус GAP Менеджер 8ур";
                    $willUpdate = true;
                }

                if ($willUpdate = true) {
                    $operation->author_id = null;
                    $operation->recipient_id = $parent->user_id;
                    $operation->money = null;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 10;
                    $parent->save();
                    $operation->save();
                }

            }
        }
    }

    public
    function hasNeedPackets($packetId, $inviterPacketId, $order)
    {
        $actualPackets = [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2, Packet::VIP, Packet::GAP1, Packet::GAP2, Packet::GAP];
        $boolean = false;
        if ($inviterPacketId == Packet::ELITE_FREE) {
            $inviterPacketId = Packet::ELITE;
        }
        $inviterPacket = Packet::where(['packet_id' => $inviterPacketId])->first();
        $packet_available_level = $inviterPacket->packet_available_level;
        if ($packetId <= $inviterPacketId && in_array($packetId, $actualPackets) && $order <= $packet_available_level) {
            $boolean = true;
        }
        return $boolean;
    }

    public
    function acceptPacketFunction($user_packet_id)
    {
        $user_packet = UserPacket::find($user_packet_id);

        if ($user_packet == null || $user_packet->is_active == 1) {
            $result['message'] = 'ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::find($user_packet->packet_id);

        if ($packet->is_auto == 1) {
            $this->acceptAutoPacket($user_packet_id);
        } else {
            $packet_old_price = 0;
            if ($packet->is_upgrade_packet == 1) {
//                $packet_old_price = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
//                    ->where('user_id', $user_packet->user_id)
//                    ->where('user_packet.is_active', 1)
//                    ->where('upgrade_type', '=', $packet->upgrade_type)
//                    ->sum('user_packet.packet_price');
                $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id);

                $share_old_price = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_id', $user_packet->user_id)
                    ->where('user_packet.is_active', 1)
                    ->where('upgrade_type', '=', $packet->upgrade_type)
                    ->max('packet.packet_share');
            }

            $user_packet->is_active = 1;
            $user_packet->packet_price = $packet->packet_price - $packet_old_price;
            $max_queue_start_position = UserPacket::where('packet_id', $user_packet->packet_id)->where('is_active', 1)->where('queue_start_position', '>', 0)->max('queue_start_position');
            $user_packet->queue_start_position = ($max_queue_start_position) ? ($max_queue_start_position + 1) : 1;
            $user_packet->save();

            $user = Users::where('user_id', $user_packet->user_id)->first();
            $send_money = 0;

            if ($packet->packet_available_level > 1 || $packet->packet_id == Packet::VIP2 || $packet->packet_id == Packet::VIP) {
                $user_id = $user->recommend_user_id;
                $counter = 0;
                $money = 0;
                while ($user_id != null) {
                    $counter++;
                    $parent = Users::where('user_id', $user_id)->first();
                    if ($parent == null) break;
                    $user_id = $parent->recommend_user_id;
                    $parent_packet = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                        ->where('user_packet.user_id', $parent->user_id)
                        ->where('user_packet.is_active', 1)
                        ->where('packet.upgrade_type', $packet->upgrade_type);

                    if ($counter > 1) {
                        $parent_packet->where('packet.sort_num', '>=', $packet->sort_num);
                    }

                    $parent_packet = $parent_packet->orderBy('packet.sort_num', 'desc')->first();

                    if ($parent_packet == null) continue;
                    if ($parent_packet->packet_available_level < $counter) continue;


                    if ($packet->packet_id == 23 || $packet->packet_id == 24 || $packet->packet_id == 25 ||
                        $packet->packet_id == 26 || $packet->packet_id == 27
                    ) {
                        if ($counter == 1) {
                            $money = $user_packet->packet_price * 20 / 100;
                        } elseif ($counter == 2) {
                            $money = $user_packet->packet_price * 5 / 100;
                        } elseif ($counter == 3) {
                            $money = $user_packet->packet_price * 5 / 100;
                        } elseif ($counter == 4) {
                            $money = $user_packet->packet_price * 10 / 100;
                        } elseif ($counter == 5) {
                            $money = $user_packet->packet_price * 10 / 100;
                            $check_vip_packet = UserPacket::where('user_packet.user_id', $parent->user_id)
                                ->where('user_packet.is_active', 1)
                                ->where('user_packet.packet_id', 27)
                                ->first();
                            if ($check_vip_packet != null) {
                                $operation = new UserOperation();
                                $operation->author_id = $user_packet->user_id;
                                $operation->recipient_id = $parent->user_id;
                                $operation->money = $user_packet->packet_price * 10 / 100;
                                $operation->operation_id = 1;
                                $operation->operation_type_id = 32;
                                $operation->operation_comment = 'Накопительный бонус';
                                $operation->save();
                                $parent->cumulative_bonus += $user_packet->packet_price * 10 / 100;
                                $parent->save();
                            }

                        }
                    }

                    if ($money > 0) {
                        $operation = new UserOperation();
                        $operation->author_id = $user_packet->user_id;
                        $operation->recipient_id = $parent->user_id;
                        $operation->money = $money;
                        $operation->operation_id = 1;
                        $operation->operation_type_id = 1;
                        $operation->operation_comment = 'Рекрутинговый бонус. "' . $packet->packet_name_ru . '". Уровень - ' . $counter;
                        $operation->save();

                        $parent->user_money = $parent->user_money + $money;
                        $parent->save();

                        $send_money = $send_money + $money;
                    }

                    $money = 0;

                    if ($counter >= $packet->packet_available_level) break;
                }

            }


            //выдача доли за покупку пакета
            if ($packet->packet_share > 0 && $user_packet->user_packet_type == 'share' && 2 == 1) {
                $user->user_share = $user->user_share + $packet->packet_share - $share_old_price;

                $share_minus = 0;
                $user->save();

                $operation = new UserOperation();
                $operation->author_id = null;
                $operation->recipient_id = $user->user_id;
                $operation->money = $packet->packet_share - $share_old_price - $share_minus;
                $operation->operation_id = 1;
                $operation->operation_type_id = 2;
                $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
                $operation->save();
            } elseif ($user_packet->user_packet_type == 'item' && $packet->packet_type == 1) {
                $operation = new UserOperation();
                $operation->author_id = null;
                $operation->recipient_id = $user->user_id;
                $operation->money = null;
                $operation->operation_id = 1;
                $operation->operation_type_id = 15;
                $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '" Вы получаете ' . $packet->packet_thing;
                $operation->save();
            } elseif ($user_packet->user_packet_type == 'service' && $packet->packet_type == 1) {
                $operation = new UserOperation();
                $operation->author_id = null;
                $operation->recipient_id = $user->user_id;
                $operation->money = null;
                $operation->operation_id = 1;
                $operation->operation_type_id = 16;
                $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '" Вы получаете ' . $packet->packet_lection;
                $operation->save();
            }

            if (2 == 1 && $packet->packet_type == 1 && $packet->packet_id != 15 && $packet->packet_id != 14 && $packet->packet_id != 20 && $packet->packet_id != 21 && $packet->packet_id != 22) {

                //пополнение акционерного фонда 1
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->money = $user_packet->packet_price * 4 / 100;
                $operation->operation_id = 1;
                $operation->fond_id = 2;
                $operation->operation_type_id = 5;
                $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
                $operation->save();

                $fond = Fond::where('fond_id', 2)->first();
                $fond->fond_money = $fond->fond_money + $user_packet->packet_price * 4 / 100;
                $fond->save();

                $send_money = $send_money + $user_packet->packet_price * 4 / 100;

                //пополнение акционерного фонда 2
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->money = $user_packet->packet_price * 4 / 100;
                $operation->operation_id = 1;
                $operation->fond_id = 3;
                $operation->operation_type_id = 25;
                $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
                $operation->save();

                $fond = Fond::where('fond_id', 3)->first();
                $fond->fond_money = $fond->fond_money + $user_packet->packet_price * 4 / 100;
                $fond->save();

                $send_money = $send_money + $user_packet->packet_price * 4 / 100;
            }

            if ($packet->packet_type == 1) {
                //спикерский доход
                $speaker_money = $this->setSpeakerBonus($user->user_id, $user->speaker_id, $packet->speaker_procent, $user_packet->packet_price);

                //офисный доход
                $office_money = $this->setOfficeBonus($user->user_id, $user->office_director_id, $packet->office_procent, $user_packet->packet_price);
                if ($speaker_money > 0) $send_money += $speaker_money;
                if ($office_money > 0) $send_money += $office_money;

            }

            //пополнение фонда компании
            $company_money = $user_packet->packet_price - $send_money;

            $operation = new UserOperation();
            $operation->author_id = $user_packet->user_id;
            $operation->recipient_id = 1;
            $operation->money = $company_money;
            $operation->operation_id = 1;
            $operation->operation_type_id = 6;
            $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
            $operation->save();

            $company = Users::where('user_id', 1)->first();
            $company->user_money = $company->user_money + $company_money;
            $company->save();

            if ($packet->packet_status_id > 0) {

                if ($packet->packet_status_id != 12 || $user->status_id < 1) {
                    $operation = new UserOperation();
                    $operation->author_id = null;
                    $operation->recipient_id = $user->user_id;
                    $operation->money = null;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 10;

                    if ($packet->packet_status_id == 21)
                        $operation->operation_comment = 'Ваш статус Клиент';
                    elseif ($packet->packet_status_id == 22)
                        $operation->operation_comment = 'Ваш статус Консультант';
                    elseif ($packet->packet_status_id == 23)
                        $operation->operation_comment = 'Ваш статус Агент';
                    elseif ($packet->packet_status_id == 24)
                        $operation->operation_comment = 'Ваш статус Менеджер';
                    $operation->save();
                    $user->status_id = $packet->packet_status_id;
                    $user->save();


                    $parentFollowers = Users::parentFollowers($user->recommend_user_id);
                    $parent = Users::where('user_id', $user->recommend_user_id)->first();
                    $needNumber = 3; // Necessary number of followers for update parent status
                    if (count($parentFollowers) >= $needNumber) {

                        $operation = new UserOperation();
                        $operation->author_id = null;
                        $operation->recipient_id = $parent->user_id;
                        $operation->money = null;
                        $operation->operation_id = 1;
                        $operation->operation_type_id = 10;

                        if ($parent->status_id == UserStatus::ELITE_MANAGER && $user->status_id == UserStatus::ELITE_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::ELITE_MANAGER)) {
                            $parent->status_id = UserStatus::BRONZE_MANAGER;
                            $operation->operation_comment = "Ваш статус Бронзовый Менеджер";
                        } elseif ($parent->status_id == UserStatus::BRONZE_MANAGER && $user->status_id == UserStatus::BRONZE_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::BRONZE_MANAGER)) {
                            $parent->status_id = UserStatus::VIP_MANAGER;
                            $operation->operation_comment = "Ваш статус Серебряный Менеджер";
                        } elseif ($parent->status_id == UserStatus::VIP_MANAGER && $user->status_id == UserStatus::VIP_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::VIP_MANAGER)) {
                            $parent->status_id = UserStatus::GOLD_MANAGER;
                            $operation->operation_comment = "Ваш статус Золотой Менеджер";
                        } elseif ($parent->status_id == UserStatus::GOLD_MANAGER && $user->status_id == UserStatus::GOLD_MANAGER && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::GOLD_MANAGER)) {
                            $parent->status_id = UserStatus::SAPPHIRE_DIRECTOR;
                            $operation->operation_comment = "Ваш статус Сапфировый Директор";
                        } elseif ($parent->status_id == UserStatus::SAPPHIRE_DIRECTOR && $user->status_id == UserStatus::SAPPHIRE_DIRECTOR && Users::isEnoughStatuses($user->recommend_user_id, UserStatus::SAPPHIRE_DIRECTOR)) {
                            $parent->status_id = UserStatus::DIAMOND_DIRECTOR;
                            $operation->operation_comment = "Ваш статус Бриллиантовый Директор";
                        }
                        $parent->save();
                        $operation->save();
                    }
                }
            }
            if ($packet->packet_type == 1 && $packet->packet_id != 23 && $packet->packet_id != 24 && $packet->packet_id != 25 && $packet->packet_id != 15 && $packet->packet_id != 9 && $packet->packet_id != 16 && $packet->packet_id != 20 && $packet->packet_id != 21) {

                $check = false;
                $child_user = $user;

                while ($check != true) {
                    $parent_user = Users::where('user_id', $child_user->parent_id)->first();
                    if ($parent_user == null) {
                        $check = true;
                        break;
                    } else {
                        if ($parent_user->status_id > 0) {

                            $packet_old_pv = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                                ->where('user_id', $user_packet->user_id)
                                ->where('user_packet.is_active', 1)
                                ->where('upgrade_type', '=', $packet->upgrade_type)
                                ->sum('packet.pv');

                            $pv = $packet->pv - $packet_old_pv;

                            if ($child_user->is_left_part == 1) {
                                if ($packet->packet_id == 26) {
                                    if ($pv > 0) $parent_user->left_child_profit += $pv;
                                } elseif ($packet->packet_id == 27) {
                                    if ($pv > 0) $parent_user->left_child_profit += $pv;
                                } elseif ($packet->packet_id == 17) {
                                    $parent_user->left_child_profit += 120;
                                } elseif ($packet->packet_id == 18) {
                                    $parent_user->left_child_profit += 240;
                                } elseif ($packet->packet_id == 19) {
                                    $parent_user->left_child_profit += 480;
                                } elseif ($packet->packet_id == 22) {
                                    $parent_user->left_child_profit += 25;
                                } else $parent_user->left_child_profit += $user_packet->packet_price * 50 / 100;

                            } else {
                                if ($packet->packet_id == 26) {
                                    if ($pv > 0) $parent_user->right_child_profit += $pv;
                                } elseif ($packet->packet_id == 27) {
                                    if ($pv > 0) $parent_user->right_child_profit += $pv;
                                } elseif ($packet->packet_id == 17) {
                                    $parent_user->right_child_profit += 120;
                                } elseif ($packet->packet_id == 18) {
                                    $parent_user->right_child_profit += 240;
                                } elseif ($packet->packet_id == 19) {
                                    $parent_user->right_child_profit += 480;
                                } elseif ($packet->packet_id == 22) {
                                    $parent_user->right_child_profit += 25;
                                } else $parent_user->right_child_profit += $user_packet->packet_price * 50 / 100;
                            }

                            $parent_user->save();
                        }
                        $child_user = $parent_user;
                    }
                }

            }
        }
    }

    public
    function setSpeakerBonus($speaker_id, $user_id, $procent, $packet_money)
    {
        $money = 0;

        if ($procent <= 0) return $money;

        $speaker = Users::where('is_speaker', 1)->where('user_id', $speaker_id)->first();
        if ($speaker == null) return $money;

        $money = $packet_money * $procent / 100;;

        $operation = new UserOperation();
        $operation->author_id = $user_id;
        $operation->recipient_id = $speaker_id;
        $operation->money = $money;
        $operation->operation_id = 1;
        $operation->operation_type_id = 7;
        $operation->operation_comment = 'Спикерский доход';
        $operation->save();

        return $money;
    }

    public
    function setOfficeBonus($office_director_id, $user_id, $procent, $packet_money)
    {
        $money = 0;

        if ($procent <= 0) return $money;

        $speaker = Users::where('is_director_office', 1)->where('user_id', $office_director_id)->first();
        if ($speaker == null) return $money;

        $money = $packet_money * $procent / 100;;

        $operation = new UserOperation();
        $operation->author_id = $user_id;
        $operation->recipient_id = $office_director_id;
        $operation->money = $money;
        $operation->operation_id = 1;
        $operation->operation_type_id = 7;
        $operation->operation_comment = 'Офисный доход';
        $operation->save();
        return $money;
    }
}
