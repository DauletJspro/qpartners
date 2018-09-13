<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\Product;
use App\Models\UserBasket;
use App\Models\UserPacket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use View;
use DB;
use Auth;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {
        $request->products = Product::where('is_show',1)
                                            ->orderBy('sort_num','asc')
                                            ->select('*')
                                            ->paginate(20);
        
        $request->basket_count = UserBasket::where('user_id',Auth::user()->user_id)->where('is_active',0)->count();
        return  view('admin.online-shop.product',[
            'row' => $request
        ]);
    }


    public function addProductToBasket(Request $request,$product_id)
    {
        $product = Product::where('product_id',$product_id)->first();

        if($product == null){
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id',Auth::user()->user_id)->where('product_id',$product_id)->where('is_active',0)->first();

        if($user_basket != null){
            $result['error'] = 'Этот товар уже добавлен в корзину!';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = new UserBasket();
        $user_basket->user_id = Auth::user()->user_id;
        $user_basket->product_price = $product->product_price;
        $user_basket->product_id = $product->product_id;
        $user_basket->is_active = 0;
        $user_basket->save();

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] =  $request->basket_count = UserBasket::where('user_id',Auth::user()->user_id)->where('is_active',0)->count();
        $result['status'] = true;
        return response()->json($result);
    }

    public function showBasket(Request $request)
    {
        $request->basket = UserBasket::leftJoin('product','product.product_id','=','user_basket.product_id')
                                    ->where('user_id',Auth::user()->user_id)
                                    ->where('user_basket.is_active',0)
                                    ->select('product.*')
                                    ->get();

        $request->basket_count = UserBasket::where('user_id',Auth::user()->user_id)->where('is_active',0)->count();
        return  view('admin.online-shop.product',[
            'row' => $request
        ]);
    }

    public function deleteProductFromBasket(Request $request,$product_id)
    {
        $product = Product::where('product_id',$product_id)->first();

        if($product == null){
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id',Auth::user()->user_id)->where('product_id',$product_id)->where('is_active',0)->first();
        $user_basket->delete();
        
        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] =  $request->basket_count = UserBasket::where('user_id',Auth::user()->user_id)->where('is_active',0)->count();
        $result['status'] = true;
        return response()->json($result);
    }
}
