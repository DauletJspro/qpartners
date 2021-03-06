<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GapCardCategory extends Model
{
    protected $fillable = [
        'title_kz',
        'title_ru'
    ];

    public function sub_categories()
    {
        return $this->hasMany(GapCardSubCategory::class);
    }


}
