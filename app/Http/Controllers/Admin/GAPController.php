<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GAP;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use Illuminate\Http\Request;

class GAPController extends Controller
{

    public function send_sv_to_top($user_packet)
    {
        $user = Users::where(['user_id' => $user_packet->user_id])->first();
        $parent = Users::where(['user_id' => $user->recommend_user_id])->first();
        $counter = 1;
        while ($parent) {
            $user_packet = UserPacket::where(['user_id' => $parent->user_id])->where(['is_active' => true])->get()->pluck('packet_id');
            $user_packet = isset($user_packet) ? $user_packet->toArray() : [];

            if (in_array(Packet::GAP, $user_packet)) {
                $parent->sv_balance = $parent->sv_balance + 1;
                if ($parent->save()) {
                    $user_operation = new UserOperation();
                    $user_operation->operation_id = 1;
                    $user_operation->money = 1;
                    $user_operation->author_id = $user->user_id;
                    $user_operation->recipient_id = $parent->user_id;
                    $user_operation->created_at = date('Y-m-d H:i:s');
                    $user_operation->operation_type_id = 38;
                    $user_operation->operation_comment = sprintf('Командный бонус GAP в размере 1sv
                    , очередь пользователя %s', $counter);
                    $user_operation->save();
                }
                GAP::check_for_premium($parent->user_id);
            }
            $parent = Users::where(['user_id' => $parent->recommend_user_id])->first();

            $counter++;
            if ($counter >= 9) {
                break;
            }
        }
    }
}