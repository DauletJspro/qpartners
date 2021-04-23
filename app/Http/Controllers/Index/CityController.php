<?php

namespace App\Http\Controllers\Index;

use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function getProductFromCity(Request $request,$cityId)
    {
        $city = City::find($cityId);

        $products = Product::where('city_id', $cityId)->paginate(9);
        return view('design_index.gap.market', compact('products', 'city'));
    }
}
