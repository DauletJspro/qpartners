<?php

namespace App\Http\Controllers\Admin;

use App\Models\CashbackShopping;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayCashbackController extends Controller
{

    public function create(Request $request)
    {
//        if(!(Auth::user()->role_id == Role::CLIENT)){
//            $user = Auth::user();
//
//            $product = Product::findOrFail($request->product_id);
//            $order = new Order();
//            $order_code = time();
//            $price = ($product->product_price * $request->product_count ) * \App\Models\Currency::pvToKzt();
//
//            $shopping_table = CashbackShopping::where('user_id', Auth::user()->user_id)->first();
//
//            $success =  $order->create([
//                'order_code' => $order_code,
//                'user_id' => Auth::user()->user_id,
//                'username' => $request->username,
//                'email' => $request->email,
//                'address' => $request->address,
//                'concact' => $request->contact,
//                'sum' => $price,
//                'products' => $request->product_id,
//                'delivery_id' => $request->delivery
//            ]);
//        }
        dd($request->all());

    }
}
