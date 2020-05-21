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

    const ITEM = [1 => 'Очищение', 2 => 'Восполнение', 3 => 'Укрепление', 4 => 'Профилактика'];


    public function Category()
    {
        return $this->belongsTo('Category');
    }

    public static function getLike($id)
    {
        $likes = Favorite::where(['item_id' => $id])->get();
        return count($likes);
    }
}
