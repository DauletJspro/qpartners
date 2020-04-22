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
    const BRONZE_MANAGER = 25;
    const SILVER_MANAGER = 26;
    const GOLD_MANAGER = 27;
    const SAPPHIRE_DIRECTOR = 28;
    const DIAMOND_DIRECTOR = 29;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
