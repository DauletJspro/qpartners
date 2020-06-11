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

    const CONSULTANT = 22;
    const AGENT = 23;
    const MANAGER = 24;
    const SILVER_MANAGER = 25;
    const GOLD_DIRECTOR = 26;
    const RUBIN_DIRECTOR = 27;
    const SAPPHIRE_DIRECTOR = 28;
    const EMERALD_DIRECTOR = 29;
    const DIAMOND_DIRECTOR = 30;

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public static function getStatusName($id)
    {
        $statusName = UserStatus::where(['user_status_id' => $id])->first();
        $statusName = $statusName ? $statusName->user_status_name : NULL;
        return $statusName;
    }
}
