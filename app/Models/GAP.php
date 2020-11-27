<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GAP extends Model
{
    const GAP1 = 1;
    const GAP2 = 2;
    const GAP3 = 3;
    const GAP4 = 4;
    const GAP5 = 5;

    public static function get_status_name($id)
    {
        switch ($id) {
            case self::GAP1:
                return 'GAP 1';
            case self::GAP2:
                return 'GAP 2';
            case self::GAP3:
                return 'GAP 3';
            case self::GAP4:
                return 'GAP 4';
            case self::GAP5:
                return 'GAP 5';
        }
    }

    public static function check_for_premium($user_id)
    {

        $user = Users::where(['user_id' => $user_id])->first();
        $parent = Users::where(['user_id' => $user->recommend_user_id])->first();
        $parent_id = $parent->user_id;
        $parent_packet = UserPacket::where(['user_id' => $parent_id])
            ->where(['packet_id' => Packet::GAP])
            ->where(['is_active' => true])
            ->first();

        //to get  GAP 1
        $enough_pv_balance = $parent->pv_balance >= 50;
        $enough_sv_balance = 1;
        $result = (new GAP)->check_child_sv($parent_id, $enough_sv_balance);
        if ($enough_pv_balance && $result) {
            $GAP_status = GAP::GAP1;
        }

        //to get  GAP 2
        $enough_pv_balance = $parent->pv_balance >= 100;
        $enough_sv_balance = 4;
        $result = (new GAP)->check_child_sv($parent_id, $enough_sv_balance);
        // date not increased now date
        $check_date = date("Y-m-d", strtotime("+1 month", $parent_packet->activated_at)) <= date("Y-m-d");
        var_dump($parent_id);
        var_dump($enough_pv_balance);
        var_dump($result);
        var_dump($check_date);
        if ($enough_pv_balance && $result && $check_date) {
            $GAP_status = GAP::GAP2;
        }

        //to get  GAP 3
        $enough_pv_balance = $parent->pv_balance >= 150;
        $enough_sv_balance = 13;
        $result = (new GAP)->check_child_sv($parent_id, $enough_sv_balance);
        $check_date = date("Y-m-d", strtotime("+2 month", $parent_packet->activated_at)) <= date("Y-m-d");
        if ($enough_pv_balance && $result && $check_date) {
            $GAP_status = GAP::GAP3;
        }


        // to get GAP 4
        $enough_pv_balance = $parent->pv_balance >= 150;
        $enough_sv_balance = 40;
        $result = (new GAP)->check_child_sv($parent_id, $enough_sv_balance);
        $check_date = date("Y-m-d", strtotime("+3 month", $parent_packet->activated_at)) <= date("Y-m-d");
        if ($enough_pv_balance && $result && $check_date) {
            $GAP_status = GAP::GAP4;
        }

        // to get GAP 5
        $enough_pv_balance = $parent->pv_balance >= 150;
        $enough_sv_balance = 121;
        $result = (new GAP)->check_child_sv($parent_id, $enough_sv_balance);
        $check_date = date("Y-m-d", strtotime("+4 month", $parent_packet->activated_at)) <= date("Y-m-d");
        if ($enough_pv_balance && $result && $check_date) {
            $GAP_status = GAP::GAP5;
        }

        $premium_bonus = 0;


        if ($GAP_status == self::GAP1) {
            $premium_bonus = 180;
        } elseif ($GAP_status == self::GAP2) {
            $premium_bonus = 180;
        } elseif ($GAP_status == self::GAP3) {
            $premium_bonus = 2000;
        } elseif ($GAP_status == self::GAP4) {
            $premium_bonus = 3000;
        } elseif ($GAP_status == self::GAP5) {
            $premium_bonus = 18000;
        }

        if ($premium_bonus) {
            $parent->user_money = $parent->user_money + $premium_bonus;
            $parent->gap_status = $GAP_status;
            if ($parent->save()) {
                $user_operation = new UserOperation();
                $user_operation->operation_id = 1;
                $user_operation->money = $premium_bonus;
                $user_operation->author_id = $user_id;
                $user_operation->recipient_id = $parent->user_id;
                $user_operation->created_at = date('Y-m-d H:i:s');
                $user_operation->operation_type_id = 39;
                $user_operation->operation_comment = sprintf('Премиум бонус в размере %s pv (%s тенге) и статус %s GAP', $premium_bonus, $premium_bonus * 500, self::get_status_name($GAP_status));
                $user_operation->save();
            }
        }

    }


    public function check_child_sv($user_id, $enough_sv_balance)
    {
        $child = Users::where(['recommend_user_id' => $user_id])->get();
        $counter = 0;
        foreach ($child as $item) {
            if ($item->sv_balance >= $enough_sv_balance) {
                $counter++;
            }
        }
        if ($counter >= 3) {
            return true;
        }
        return false;
    }
}
