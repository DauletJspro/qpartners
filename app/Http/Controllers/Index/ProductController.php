<?php

namespace App\Http\Controllers\Index;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::where(['product_id' => $id])->first();
        return view('design_index.product.detail', ['product' => $product]);
    }
}
