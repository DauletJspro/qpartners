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
        return view('design_index.gap.card');
    }

    public function gapCardsubCategories(Request $request,$id)
    {
        $city_id = request()->input('city_id');
        $request['sub_category_id'] = $id;
        return view('design_index.gap.card');
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
                $gapItems = GapCardItem::where('city_id', $request->city_id)->orderBy('discount_percentage','asc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "price-high-low"){
                $gapItems = GapCardItem::where('city_id', $request->city_id)->orderBy('discount_percentage','desc')->paginate(9);
            }
        }

        if(isset($request->orderBy)){
            if($request->orderBy == "popular"){
                $gapItems = DB::table('ratings')
                    ->join('gap_card_items', 'ratings.gap_card_id', '=', 'gap_card_items.id')
                    ->select(DB::raw('avg(rating) as average, gap_card_items.*'))
                    ->groupBy('gap_card_id')
                    ->orderBy('average', 'desc')
                    ->get();
            }
        }
        if($request->ajax())
        {
            return view('design_index.gap.renders.gap_card.gap_card',compact('gapItems'))->render();
        }
    }
}
