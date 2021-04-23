<?php

namespace App\Http\Controllers\Index;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GapMarketController extends Controller
{
    public function show()
    {
        $categories = \App\Models\Category::all();
        $sub_category_id = request()->input('sub_category_id');
        if (isset($sub_category_id)) {
            $products = \App\Models\Product::where(['sub_category_id' => $sub_category_id])->paginate(9);
        } else {
            $products = \App\Models\Product::paginate(9);
        }
        return view('design_index.gap.market', compact('products'));
    }

    public function sortPrice()
    {
        $products = Product::orderBy('product_price','desc')->paginate(9);

        return view('design_index.gap.market', compact('products'));
    }
}
