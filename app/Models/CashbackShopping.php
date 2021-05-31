<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;

class CashbackShopping extends Model
{
    protected $fillable = ['user_id', 'cash'];
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id','user_id');
    }
}
