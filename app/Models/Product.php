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

    protected $fillable = [
        'product_name_ru','product_desc_ru','full_description_ru',
        'ball','product_cash','sort_num','product_image','product_id',
        'information','composition','is_popular','is_new','sub_category_id','item_id','product_price',
        'city_id','user_id','product_image','price_partner', 'price_client', 'price_shareholder',
        'ball_partner', 'ball_client', 'ball_shareholder'
    ];

    protected $dates = ['deleted_at'];

    const ITEM = [1 => 'Очищение', 2 => 'Восполнение', 3 => 'Укрепление', 4 => 'Профилактика'];


    public function Category()
    {
        return $this->belongsTo('Category');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function favorite()
    {
        $this->hasOne('App\Models\Product');
    }

    public static function getLike($id)
    {
        $likes = Favorite::where(['item_id' => $id])->get();
        return count($likes);
    }

    public static function get_mac_address()
    {
        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');

        return $MAC;
    }

    public static function hasLiked($item_id, $user_id)
    {
        /** @var Favorite $hasLiked */
        if ($user_id) {
            $hasLiked = Favorite::where(['item_id' => $item_id]);
        } elseif (!$user_id) {
            $hasLiked = Favorite::where(['ip_address' => self::get_mac_address()]);
        }
        $hasLiked = $hasLiked->first();

        if (count($hasLiked)) {
            return true;
        }
        return false;
    }


}
