<?php

namespace App\Http\Controllers\Admin;

use App\Models\CardOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GapCardOrderController extends Controller
{
    public function index()
    {
        $orders = CardOrder::where(['user_id' => Auth::user()->user_id])->orderBy('created_at','desc')->get();
        return view('admin.gap_card_order.index', compact('orders'));
    }
}
