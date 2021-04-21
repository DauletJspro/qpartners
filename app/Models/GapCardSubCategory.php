<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GapCardSubCategory extends Model
{
    protected $fillable = [
        'title_kz',
        'title_ru',
        'gap_card_category_id'
    ];

    public function items()
    {
        return $this->hasMany(GapCardItem::class);
    }
}
