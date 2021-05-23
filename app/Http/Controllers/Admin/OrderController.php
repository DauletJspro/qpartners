<?php
namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Packet;
use App\Models\Role;
use App\Models\Product;
use App\Models\UserPacket;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->role_id == 1){
            $request = Order::select('*')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
            return view('admin.orders.index', [
                'row' => $request
            ]);
        }else{
            return redirect()->route('orders.edit')->with('danger', 'У вас нет прав Администратора!');

        }
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