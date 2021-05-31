<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardOrder extends Model
{
    protected $fillable = [
        'gap_card_id',
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'email',
        'total_price',
        'is_paid',
        'export_type',
        'payment_type',
        'comment',
    ];

    protected $date = [
        'created_at',
        'updated_at'
    ];

    public function gap_card()
    {
        return $this->hasOne(\App\Models\GapCardItem::class,'id', 'gap_card_id');
    }

}
