<?php

namespace App\Http\Controllers\Index;

use App\Models\CashbackShopping;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GapMarketController extends Controller
{
    public function show()
    {

        $categories = DB::table('categories')
            ->Leftjoin('sub_categories', 'sub_categories.category_id','=', 'categories.id')
            ->Leftjoin('product', 'product.sub_category_id', '=', 'sub_categories.id')
            ->selectRaw('count(product.product_id) as total, categories.*')
            ->groupBy('categories.id')
            ->get();
        $sub_category_id = request()->input('sub_category_id');
        if (isset($sub_category_id)) {
            $products = \App\Models\Product::where(['sub_category_id' => $sub_category_id])->paginate(9);
        } else {
            $products = \App\Models\Product::paginate(9);
        }
        return view('design_index.gap.market', compact('products', 'categories'));
    }

    public function FilterProduct(Request $request)
    {
        if(isset($request->orderBy)){
            if($request->orderBy == "price-low-high"){
                $products = Product::orderBy('product_price','asc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "price-high-low"){
                $products = Product::orderBy('product_price','desc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "popular"){
                $products = DB::table('user_basket')->
                join('product','user_basket.product_id', '=', 'product.product_id')->
                select('product.product_id','product.product_name_ru','product.product_desc_ru','product.product_price')->
                groupBy('product.product_id')->
                orderBy(DB::raw('count(product.product_id)'), 'DESC')->
                get();
            }
        }
        if($request->ajax())
        {
            return view('design_index.gap.product_card.product_card',compact('products'))->render();
        }

    }


}
