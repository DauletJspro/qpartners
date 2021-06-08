<?php

namespace App\Http\Controllers\Index;

use App\Models\GapCardCategory;
use App\Models\GapCardItem;
use App\Models\GapCardSubCategory;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GapCardController extends Controller
{
    public function show()
    {
        $categories = DB::table('gap_card_categories as categories')
                ->Leftjoin('gap_card_sub_categories as sub_categories', 'sub_categories.gap_card_category_id', '=', 'categories.id')
                ->Leftjoin('gap_card_items as items', 'items.gap_card_sub_category_id','=','sub_categories.id')
                ->selectRaw('count(items.id) as total, categories.*')
                ->groupBy('categories.id')
                ->get();
        return view('design_index.gap.card', compact('categories'));
    }

    public function detail($id)
    {
        $gap_card = GapCardItem::findOrFail($id);
        $similarCards = GapCardItem::where('gap_card_sub_category_id',$gap_card->gap_card_sub_category_id)->where('id','!=',$gap_card->id)->limit(5)->get();
        $rating = Rating::where('user_id', Auth::user()->user_id)->where('gap_card_id', $id)->first();

        return view('design_index.gap.gap_card.detail', compact('gap_card','similarCards', 'rating'));
    }
    public function FilterCards(Request $request)
    {
        if(isset($request->orderBy)){
            if($request->orderBy == "price-low-high"){
                $products = GapCardItem::where('city_id', $request->city_id)->orderBy('price','asc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "price-high-low"){
                $products = GapCardItem::where('city_id', $request->city_id)->orderBy('price','desc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "popular"){
                $products = DB::table('ratings')
                    ->join('gap_card_items', 'ratings.gap_card_id', '=', 'gap_card_items.id')
                    ->select(DB::raw('avg(rating) as average, gap_card_items.*'))
                    ->groupBy('gap_card_id')
                    ->orderBy('average', 'desc')
                    ->get();
            }
        }
        if($request->ajax())
        {
            return view('design_index.gap.product_card.product_card',compact('products'))->render();
        }
    }
}
