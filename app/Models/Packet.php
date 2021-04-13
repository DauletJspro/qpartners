<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use DB;

class Packet extends Model
{
    protected $table = 'packet';
    protected $primaryKey = 'packet_id';
    protected $fillable = ['packet_price', 'packet_name_ru', 'packet_share', 'packet_lection', 'packet_thing', 'sort_num', 'packet_price', 'is_show'];
    const CLASSIC = 23;
    const PREMIUM = 24;
    const ELITE = 25;
    const VIP2 = 27;
    const GAP = 30;
    const GAPTechno = 31;
    const GAPAuto = 32;
    const GAPHome = 33;
    const JASTAR = 40;
    const QAMQOR = 41;
    const JAS_OTAU = 42;
    const QOLDAU = 43;
    const BASPANA_PLUS = 44;
    const BASPANA = 45;
    const TULPAR_PLUS = 46;
    const TULPAR = 47;


//    use SoftDeletes;

//    protected $dates = ['deleted_at'];

    public static function actualPacket()
    {
        return [
            self::CLASSIC,
            self::PREMIUM,
            self::ELITE,
            self::GAPTechno,
            self::GAPAuto,
            self::GAPHome,
            self::VIP2,
        ];
    }

    public static function actualPacketWithoutGaps()
    {
        return [
            self::CLASSIC,
            self::PREMIUM,
            self::ELITE,
            self::VIP2,
        ];
    }

    public static function actualPacketOnlyGaps()
    {
        return [
            self::GAPTechno,
            self::GAPAuto,
            self::GAPHome,
        ];
    }

    public static function actualPassivePackets()
    {
        return [
            self::JASTAR,
            self::QAMQOR,
            self::JAS_OTAU,
            self::QOLDAU,
            self::BASPANA_PLUS,
            self::BASPANA,
            self::TULPAR_PLUS,
            self::TULPAR
        ];
    }

    public static function actualAllPackets(){
        return[
            self::CLASSIC,
            self::PREMIUM,
            self::ELITE,
            self::GAPTechno,
            self::GAPAuto,
            self::GAPHome,
            self::VIP2,
            self::JASTAR,
            self::QAMQOR,
            self::JAS_OTAU,
            self::QOLDAU,
            self::BASPANA_PLUS,
            self::BASPANA,
            self::TULPAR_PLUS,
            self::TULPAR
        ];
    }


    public static function limit($user)
    {
        $messageBody = '';
        $success = true;
        $userId = $user->user_id;
        $userStatus = $user->user_status;
        $availableBonuses = [1, 32, 22];
        $monday = date('Y-m-d H:i:s', strtotime('monday this week'));
        $sunday = date('Y-m-d H:i:s', strtotime('sunday this week'));
        $firstDay = date('Y-m-d H:i:s', strtotime('first day of this month'));
        $lastDay = date('Y-m-d H:i:s', strtotime('last day of this month'));

        $incomeForMonth = UserOperation::where(['recipient_id' => $userId])
            ->where(['operation_type_id' => $availableBonuses])
            ->whereBetween(['created_at', [$firstDay, $lastDay]])
            ->get();

        $incomeWeek = UserOperation::where(['recipient_id' => $userId])
            ->where(['operation_type_id' => $availableBonuses])
            ->whereBetween('created_at', [$monday, $sunday])
            ->get();

        $incomeForMonth = collect($incomeForMonth);
        $incomeForMonth = $incomeForMonth->map(function ($item) {
            return $item->money;
        });

        $incomeForMonth = array_map($incomeForMonth->all());

        $incomeWeek = collect($incomeWeek);
        $incomeWeek = $incomeWeek->map(function ($item) {
            return $item->money;
        });

        $incomeWeek = array_sum($incomeWeek->all());

        switch ($userStatus) {
            case UserStatus::CONSULTANT;
                if ($incomeForMonth >= 200) {
                    $messageBody = 'Ваш лимит на неделю не превышает 200$. ';
                    $success = false;
                }
                break;
            case UserStatus::PREMIUM_MANAGER:
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 1000$. ';
                    $success = false;
                }
                break;
            case UserStatus::ELITE_MANAGER:
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 2 000$. ';
                    $success = false;
                }
                break;
            case UserStatus::VIP_MANAGER:
                if ($incomeForMonth >= 1000000) {
                    $messageBody = 'Ваш лимит на неделю не превышает 4 000$. ';
                    $success = false;
                }
                break;
        }
        return [
            'message' => $messageBody,
            'success' => $success,
        ];
    }

    public static function limitBonus($user)
    {
        $messageBody = '';
        $success = true;
        $userId = $user->user_id;
        $userStatus = $user->status_id;
        $availableBonuses = [1, 32, 22];
        $firstDay = date('Y-m-d H:i:s', strtotime('first day of this month'));
        $lastDay = date('Y-m-d H:i:s', strtotime('last day of this month'));

        $incomeForMonth = UserOperation::where(['recipient_id' => $userId])
            ->whereIn('operation_type_id', $availableBonuses)
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->get();
        $incomeForMonth = collect($incomeForMonth);
        $incomeForMonth = $incomeForMonth->map(function ($item) {
            return $item->money;
        });

        Log::info($incomeForMonth);

        $incomeForMonth = array_sum($incomeForMonth->all());
        Log::info($incomeForMonth);
        switch ($userStatus) {
            case UserStatus::CONSULTANT;
                if ($incomeForMonth >= 200) {
                    $messageBody = 'Ваш лимит на месяц не превышает 200$. ';
                    $success = false;
                }
                break;
            case UserStatus::PREMIUM_MANAGER:
                if ($incomeForMonth >= 500) {
                    $messageBody = 'Ваш лимит на месяц не превышает 500$. ';
                    $success = false;
                }
                break;
            case UserStatus::VIP_MANAGER:
                if ($incomeForMonth >= 1000) {
                    $messageBody = 'Ваш лимит на месяц не превышает 1 000$. ';
                    $success = false;
                }
                break;
	        case  UserStatus::BRONZE_MANAGER:
		        if ($incomeForMonth >= 2000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::SILVER_MANAGER:
		        if ($incomeForMonth >= 3000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::GOLD_MANAGER:
		        if ($incomeForMonth >= 4000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::PLATINUM_MANAGER:
		        if ($incomeForMonth >= 5000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::RUBIN_DIRECTOR:
		        if ($incomeForMonth >= 10000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::SAPPHIRE_DIRECTOR:
		        if ($incomeForMonth >= 12500){
			        $success = false;
		        }
		        break;
	        case  UserStatus::EMERALD_DIRECTOR:
		        if ($incomeForMonth >= 15000){
			        $success = false;
		        }
		        break;
	        case  UserStatus::DIAMOND_DIRECTOR:
		        if ($incomeForMonth >= 20000){
			        $success = false;
		        }
		        break;
        }
        return $success;
    }

    public static function checkQualificationBonusTime($user, $bonusTime)
    {
        $success = true;
        $userId = $user->user_id;
        $userPacketActivate = UserPacket::where(['user_id' => $userId, 'is_active' => 1])->orderBy('packet_id', 'desc')->first();
        $day = date("Y-m-d", strtotime("-" . $bonusTime . " day"));

        if ($userPacketActivate->updated_at < $day) {
            $success = false;
        }
        Log::info($userPacketActivate);
        Log::info($day);

        return $success;
    }

    public function userPacket()
    {
        $this->hasMany('App\Models\UserPacket');
    }

    public static function getHasGapPackets($user_id)
    {
        $userHasPackets = UserPacket::where(['user_id' => $user_id])
            ->where(['is_active' => true])
            ->whereIn('packet_id', [Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome])
            ->get()
            ->pluck('packet_id');
        $userHasPackets = isset($userHasPackets) ? $userHasPackets->toArray() : [];

        return $userHasPackets;
    }
}
