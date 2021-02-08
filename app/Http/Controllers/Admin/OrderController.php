<?php
namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Packet;
use App\Models\Product;
use App\Models\UserPacket;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {
        $request = Order::select('*')
            ->orderBy('created_at', 'desc')            
            ->paginate(20);
        return view('admin.orders.index', [
            'row' => $request
        ]);
    }

    public function editUserOrder(){
        $getOrders = Order::where(['user_id' => Auth::user()->user_id, 'accepted' => 0])->get();
        return view('admin.orders.show_user_orders', compact('getOrders'));


    }
    public function updateOrder(Request $request, $id){
    $item = Order::find($id);
    $item->accepted = 1;
    $item->save();

    if ($item){
        return redirect()->route('orders.edit');
    }



    }

}
?>