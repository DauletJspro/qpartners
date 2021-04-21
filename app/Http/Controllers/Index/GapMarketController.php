<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GapMarketController extends Controller
{
    public function show()
    {
        return view('design_index.gap.market');
    }
}
