<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConsumerRatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::where('user_id', Auth::user()->user_id)->get();
        return view('admin.gap.gap_card_rating.index',compact('ratings'));
    }
}
