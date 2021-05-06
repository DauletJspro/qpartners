<?php

namespace App\Http\Controllers\Index;

use App\Models\GapCardItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GapCardController extends Controller
{
    public function show()
    {
        return view('design_index.gap.card');
    }

    public function FilterCards(Request $request)
    {
        if(isset($request->orderBy)){
            if($request->orderBy == "price-low-high"){
                $products = GapCardItem::orderBy('price','asc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "price-high-low"){
                $products = GapCardItem::orderBy('price','desc')->paginate(9);
            }
        }

        if($request->ajax())
        {
            return view('design_index.gap.product_card.product_card',compact('products'))->render();
        }
    }
}
