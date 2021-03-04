<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class UserStatus extends Model
{
    protected $table = 'user_status';
    protected $primaryKey = 'user_status_id';

    const SUPER_MANAGER = 43;

    const FREE_ELITE_OWNER = 20;
    const CLIENT = 21;
    const CONSULTANT = 22;
    const PREMIUM_MANAGER = 23;
    const ELITE_MANAGER = 24;
    const VIP_MANAGER = 25;
    const BRONZE_MANAGER = 26;
    const SILVER_MANAGER = 27;
    const GOLD_MANAGER = 28;
    const PLATINUM_MANAGER = 29;
    const RUBIN_DIRECTOR = 30;
    const SAPPHIRE_DIRECTOR = 31;
    const EMERALD_DIRECTOR = 32;
    const DIAMOND_DIRECTOR = 33;

    const GAP_MANAGER = 34;
    const GAP1_MANAGER = 35;
    const GAP2_MANAGER = 36;
    const GAP3_MANAGER = 37;
    const GAP4_MANAGER = 38;
    const GAP5_MANAGER = 39;
    const GAP6_MANAGER = 40;
    const GAP7_MANAGER = 41;
    const GAP8_MANAGER = 42;
    const ACTIV_1 = 44;
    const ACTIV_2 = 45;
    const ACTIV_3 = 46;
    const PASSIV = 47;
    const GAP1 = 48;
    const GAP2 = 49;
    const GAP3 = 50;
    const GAP4 = 51;
    const GAP5 = 52;

    const JASTAR = 55;
    const QAMQOR = 56;
    const JAS_OTAU = 57;
    const QOLDAU = 58;
    const BASPANA_PLUS = 59;
    const BASPANA = 60;
    const TULPAR_PLUS = 61;
    const TULPAR = 62;


    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public static function getStatusName($id)
    {
        $statusName = UserStatus::where(['user_status_id' => $id])->first();
        $statusName = $statusName ? $statusName->user_status_name : NULL;
        return $statusName;
    }

    public static function getGapStatusName($id)
    {
        $statusName = UserStatus::where(['user_status_id' => $id])
            ->whereIn('user_status_id', [
                self::GAP4_MANAGER,
                self::GAP5_MANAGER,
                self::GAP6_MANAGER,
                self::GAP7_MANAGER,
                self::GAP8_MANAGER,
                self::ACTIV_1,
                self::ACTIV_2,
                self::ACTIV_3,
                self::PASSIV,
            ])
            ->first();
        $statusName = isset($statusName) ? $statusName->user_status_name : 'нету';
        return $statusName;
    }
}
