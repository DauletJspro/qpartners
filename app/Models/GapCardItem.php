<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GapCardItem extends Model
{
    protected $table = 'gap_card_items';
    protected $fillable = [
        'title_kz',
        'title_ru',
        'description_kz',
        'description_ru',
        'image',
        'discount_percentage',
        'price',
        'gap_card_sub_category_id',
    ];


    public function gapCardSubCategory()
    {
        return $this->belongsTo(GapCardSubCategory::class);
    }
}
