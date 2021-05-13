<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'gap_card_id', 'rating'
    ];
}
