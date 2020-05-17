<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['is_popular', 'is_show', 'product_name_ru', 'product_desc_ru', 'product_image', 'product_price', 'sort_num', 'ball', 'product_cash', 'is_new', 'is_show_header', 'category_id', 'item_id'];
    public $is_popular;
    const ITEM = [1 => 'Очищение', 2 => 'Восполнение', 3 => 'Укрепление', 4 => 'Профилактика'];


    public function Category()
    {
        return $this->belongsTo('Category');
    }
}
