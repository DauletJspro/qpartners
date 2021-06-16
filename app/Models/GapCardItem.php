<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GapCardItem extends Model
{
    protected $table = 'gap_card_items';
    protected $fillable = [
        'title_kz', 'title_ru', 'description_kz', 'description_ru', 'image', 'discount_percentage', 'price',
        'gap_card_sub_category_id', 'user_id', 'brand_name', 'company_name', 'city_id', 'office',
        'phone', 'instagram', 'site', 'full_description_ru',  'house', 'street', 'district', 'image',
        'discount_percentage', 'is_checked'
    ];


    public function gapCardSubCategory()
    {
        return $this->belongsTo(GapCardSubCategory::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Models\CardOrder::class, 'gap_card_id', 'id');
    }

    public static function getCity($id){
        return City::where('city_id', $id)->first()->city_name_ru;
    }
}
