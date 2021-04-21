<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable = [
        'title_kz',
        'title_ru',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
