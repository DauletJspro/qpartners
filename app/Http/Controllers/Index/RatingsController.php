<?php

namespace App\Http\Controllers\Index;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingsController extends Controller
{
    public function rating(Request $request, Rating $ratingDB)
    {

        if($request->ajax())
        {
            $rating = $request->get('rating');
            $user_id = Auth::user()->user_id;
            $gap_card_id = $request->get('gap_card_id');
            DB::table('ratings')->insert([
                [
                    'user_id' => $user_id,
                    'rating' => $rating,
                    'gap_card_id' => $gap_card_id
                ]
            ]);
        }
    }
}
