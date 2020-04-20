<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class UserPacket extends Model
{
    protected $table = 'user_packet';
    protected $primaryKey = 'user_packet_id';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
