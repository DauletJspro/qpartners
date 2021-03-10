<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GAP;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\UserStatus;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GAPController extends Controller
{

    public function send_group_sv($user_packet)
    {
        $user = Users::where(['user_id' => $user_packet->user_id])->first();
        $parent = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();
        $packet = Packet::where(['packet_id' => $user_packet->packet_id])->first();
        $counter = 1;
        $userHasPackets = Packet::getHasGapPackets($user->user_id);
        $isPassivePacket = in_array($user_packet->packet_id,
            [
                Packet::JASTAR,
                Packet::QAMQOR,
                Packet::JAS_OTAU,
                Packet::QOLDAU,
                Packet::BASPANA_PLUS,
                Packet::BASPANA,
                Packet::TULPAR_PLUS,
                Packet::TULPAR
            ]);

        while ($parent) {
            $parentHasPackets = Packet::getHasGapPackets($parent->user_id);
            $parentMaxGapPacket = !empty($parentHasPackets) ? max($parentHasPackets) : [];

            $retrieve_sv = $this->getRetrieveSv($userHasPackets);

            if ($packet->packet_id == Packet::GAP) {
                $retrieve_sv = 0;
            }
            if ($isPassivePacket) {
                $retrieve_sv = 0;
            }

            $checkHasGAP = in_array(Packet::GAPTechno, $parentHasPackets) ||
                in_array(Packet::GAPAuto, $parentHasPackets) ||
                in_array(Packet::GAPHome, $parentHasPackets);

            $gapSatisfyLevel = ($parentMaxGapPacket == Packet::GAPTechno && $counter <= 4) ||
                ($parentMaxGapPacket == Packet::GAPAuto && $counter <= 6) ||
                ($parentMaxGapPacket == Packet::GAPHome && $counter <= 8);

            if ($isPassivePacket) {
                $gapSatisfyLevel = true;
            }


            if ($checkHasGAP && $gapSatisfyLevel) {
                $send_sv = $packet->send_sv - $retrieve_sv;
                $parent->group_sv_balance = $parent->group_sv_balance + $send_sv;
                if ($parent->save()) {
                    $user_operation = new UserOperation();
                    $user_operation->operation_id = 1;
                    $user_operation->money = $send_sv;
                    $user_operation->author_id = $user->user_id;
                    $user_operation->recipient_id = $parent->user_id;
                    $user_operation->created_at = date('Y-m-d H:i:s');
                    $user_operation->operation_type_id = 38;
                    $user_operation->operation_comment = sprintf('Групповой обьем %s в размере %s sv
                    , уровень %s', $packet->packet_name_ru, $send_sv, $counter);
                    $user_operation->save();
                }
            }
            if (isset($parent) && !$isPassivePacket) {
                GAP::check_for_premium($parent->user_id);
            }

            $parent = Users::where(['user_id' => $parent->recommend_user_id])->first();

            $counter++;
            if ($counter >= 9) {
                break;
            }
        }
    }

    public function getRetrieveSv($userHasPackets)
    {
        $retrieve_sv = 0;
        if (in_array(Packet::GAPTechno, $userHasPackets)) {
            $retrieve_sv = $retrieve_sv + (Packet::where(['packet_id' => Packet::GAPTechno])->first()->send_sv);
            if (in_array(Packet::GAPAuto, $userHasPackets)) {
                $retrieve_sv = $retrieve_sv + (Packet::where(['packet_id' => Packet::GAPTechno])->first()->send_sv);
            }
        } elseif (in_array(Packet::GAPAuto, $userHasPackets)) {
            $retrieve_sv = $retrieve_sv + (Packet::where(['packet_id' => Packet::GAPAuto])->first()->send_sv);
        }

        return $retrieve_sv;
    }

    public function send_personal_sv($user_packet)
    {
        $user = Users::where(['user_id' => $user_packet->user_id])->first();
        $packet = Packet::where(['packet_id' => $user_packet->packet_id])->first();
        $userHasPackets = $userHasPackets = Packet::getHasGapPackets($user->user_id);
        $retrieve_sv = $this->getRetrieveSv($userHasPackets);

        if ($packet->packet_id == Packet::GAP) {
            $retrieve_sv = 0;
        }

        $send_sv = $packet->send_sv - $retrieve_sv;
        $user->personal_sv_balance = $user->personal_sv_balance + $send_sv;
        if ($user->save()) {
            $user_operation = new UserOperation();
            $user_operation->operation_id = 1;
            $user_operation->money = $send_sv;
            $user_operation->author_id = $user->user_id;
            $user_operation->recipient_id = $user->user_id;
            $user_operation->created_at = date('Y-m-d H:i:s');
            $user_operation->operation_type_id = 42;
            $user_operation->operation_comment = sprintf('Персональный обьем %s в размере %s sv',
                $packet->packet_name_ru
                , $send_sv);
            $user_operation->save();
        }
    }

    public function give_bonus($user_packet)
    {
        //  Рекрутинговый бонус
        $user = Users::where(['user_id' => $user_packet->user_id])->first();
        if (isset($user->inviter_user_id)) {
            $inviter = Users::where(['user_id' => $user->inviter_user_id])->where('is_activated', '=', true)->first();
        } else {
            $inviter = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();
        }
        $isPassivePacket = in_array($user_packet->packet_id, [
            Packet::JASTAR,
            Packet::QAMQOR,
            Packet::JAS_OTAU,
            Packet::QOLDAU,
            Packet::BASPANA_PLUS,
            Packet::BASPANA,
            Packet::TULPAR_PLUS,
            Packet::TULPAR
        ]);
        $userHasGapPrice = UserPacket::beforePurchaseSumWithPacketId($user_packet->user_id, $user_packet->packet_id, true);
        if ($isPassivePacket) {
            $userHasGapPrice = 0;
        }

        $packet = Packet::where(['packet_id' => $user_packet->packet_id])->first();
        $packet_price = $user_packet->packet_price;
        if (in_array($packet->packet_id, [Packet::JASTAR, Packet::QAMQOR, Packet::JAS_OTAU, Packet::QOLDAU])) {
            $packet_price = $packet_price / 2;
        } elseif (in_array($packet->packet_id, [Packet::BASPANA_PLUS, Packet::BASPANA, Packet::TULPAR_PLUS, Packet::TULPAR])) {
            $packet_price = $packet_price * (62.5 / 100);
        }

        if (isset($inviter)) {
            $bonus = ($packet_price - $userHasGapPrice) * (15 / 100);
            $inviter->user_money = $inviter->user_money + $bonus;
            if ($inviter->save()) {
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->recipient_id = $inviter->user_id;
                $operation->money = $bonus;
                $operation->operation_id = 1;
                $operation->operation_type_id = 1;
                $operation->operation_comment = 'Рекрутинговый бонус. "' . $packet->packet_name_ru . '".';
                $operation->save();
            }
        }

        // Структурный бонус
        $parent = Users::where(['user_id' => $user->recommend_user_id])->where('is_activated', '=', true)->first();
        $bonus = ($packet_price - $userHasGapPrice) * (5 / 100);
        if (isset($parent)) {
            $parent->user_money = $parent->user_money + $bonus;
            if ($parent->save()) {
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->recipient_id = $parent->user_id;
                $operation->money = $bonus;
                $operation->operation_id = 1;
                $operation->operation_type_id = 1;
                $operation->operation_comment = 'Структурный бонус. "' . $packet->packet_name_ru . '".';
                $operation->save();
            }
        }
    }

    public function give_status($user_packet)
    {

        try {
            DB::beginTransaction();
            $user = Users::where(['user_id' => $user_packet->user_id])->first();
            $packet = Packet::where(['packet_id' => $user_packet->packet_id])->first();
            $user->gap_status = $packet->packet_status_id;
            $user->save();

            $status = UserStatus::where(['user_status_id' => $packet->packet_status_id])->first()->user_status_name;

            $isPassivePacket = in_array($user_packet->packet_id, [
                Packet::JASTAR,
                Packet::QAMQOR,
                Packet::JAS_OTAU,
                Packet::QOLDAU,
                Packet::BASPANA_PLUS,
                Packet::BASPANA,
                Packet::TULPAR_PLUS,
                Packet::TULPAR
            ]);

            $operation_comment = $isPassivePacket ? 'Ваш пассив статус ' . $status : 'Ваш GAP статус ' . $status;

            $operation = new UserOperation();
            $operation->author_id = $user->user_id;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;
            $operation->operation_comment = $operation_comment;
            $operation->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            var_dump($exception->getFile() . ' ' . $exception->getLine() . ' ' . $exception->getMessage());
            die();
        }


    }
}