<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GAP extends Model
{

    public static function check_for_premium($user_id)
    {
        var_dump($user_id);
        $premium_bonus = 0;
        $user = Users::where(['user_id' => $user_id])->first();

        $userMaxGapPacket = max(UserPacket::where(['user_id' => $user->user_id])
            ->whereIn('packet_id', [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])->get()
            ->pluck('packet_id'
            )->toArray());

        $user_packet = UserPacket::where(['user_id' => $user->user_id])
            ->whereIn('packet_id', [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])
            ->where(['is_active' => true])
            ->first();


        //to get  GAP 1
        $enough_sv_balance = 5;
        $result = (new GAP)->check_child_sv($user->user_id, $enough_sv_balance);
        if ($result) {
            $GAP_status = UserStatus::GAP1;
        }

        // to get GAP 2
        $enough_sv_balance = 20;
        $result = (new GAP)->check_child_sv($user->user_id, $enough_sv_balance);
        // date not increased now date
        $check_date = date("Y-m-d", strtotime("+1 month", $user_packet->activated_at)) <= date("Y-m-d");
        if ($result && $check_date) {
            $GAP_status = UserStatus::GAP2;
            $premium_bonus = 180;
        }

        // to get GAP 3
        $enough_sv_balance = 65;
        $result = (new GAP)->check_child_sv($user->user_id, $enough_sv_balance);
        // date not increased now date
        $check_date = date("Y-m-d", strtotime("+3 month", $user_packet->activated_at)) <= date("Y-m-d");
        if ($result && $check_date) {
            $GAP_status = UserStatus::GAP3;
            $premium_bonus = 2000;
        }

        // to get GAP 7
        $enough_sv_balance = 200;
        $result = (new GAP)->check_child_sv($user->user_id, $enough_sv_balance);
        // date not increased now date
        $check_date = date("Y-m-d", strtotime("+6 month", $user_packet->activated_at)) <= date("Y-m-d");
        if ($result && $check_date && in_array($userMaxGapPacket, [Packet::GAPAuto, Packet::GAPHome])) {
            $GAP_status = UserStatus::GAP4;
            $premium_bonus = 6000;
        }

        // to get GAP 5
        $enough_sv_balance = 605;
        $result = (new GAP)->check_child_sv($user->user_id, $enough_sv_balance);
        // date not increased now date
        $check_date = date("Y-m-d", strtotime("+12 month", $user_packet->activated_at)) <= date("Y-m-d");
        if ($result && $check_date && in_array($userMaxGapPacket, [Packet::GAPHome])) {
            $GAP_status = UserStatus::GAP5;
            $premium_bonus = 18000;
        }


        if ($user->gap_status < $GAP_status) {
            $user->user_money = $user->user_money + $premium_bonus;
            $user->gap_status = $GAP_status;
            $status_name = UserStatus::where(['user_status_id' => $GAP_status])->first()->user_status_name;
            if ($user->save()) {
                $user_operation = new UserOperation();
                $user_operation->operation_id = 1;
                $user_operation->money = $premium_bonus;
                $user_operation->author_id = $user_id;
                $user_operation->recipient_id = $user->user_id;
                $user_operation->created_at = date('Y-m-d H:i:s');
                $user_operation->operation_type_id = 39;
                $user_operation->operation_comment = sprintf('Вы получаете премиум бонус в размере %s pv (%s тенге) и статус %s GAP', $premium_bonus, $premium_bonus * 500, $status_name);
                $user_operation->save();
            }
        }

    }

    public function check_child_sv($user_id, $enough_sv_balance)
    {
        $child = Users::where(['recommend_user_id' => $user_id])->get();
        $counter = 0;
        foreach ($child as $oneChild) {
            if (($oneChild->personal_sv_balance + $oneChild->group_sv_balance) >= $enough_sv_balance) {
                $counter++;
            }
        }

        if ($counter >= 3) {
            return true;
        }
        return false;
    }
}
