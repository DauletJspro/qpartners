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

    public function gap_card()
    {
        return $this->belongsTo(GapCardItem::class,'gap_card_id','id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id','user_id');
    }
}
