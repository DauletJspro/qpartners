<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = 
    [
        'user_id',
        'user_balance'
    ];
    
    

    public function users(){
        return $this->hasMany(\App\Models\Users::class, 'user_id', 'id');
    }
}
