<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Packet extends Model
{
    protected $table = 'packet';
    protected $primaryKey = 'packet_id';

    const CLASSIC = 23;
    const PREMIUM = 24;
    const ELITE = 25;
    const VIP = 26;
    const VIP2 = 27;
    const GAP1 = 28;
    const  GAP2 = 29;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
