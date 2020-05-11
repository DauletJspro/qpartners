<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\Product;
use App\Models\UserBasket;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
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
        $request->products = Product::where('is_show', 1)
            ->orderBy('sort_num', 'asc')
            ->select('*')
            ->paginate(20);

        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        return view('admin.online-shop.product', [
            'row' => $request
        ]);
    }


    public function addProductToBasket(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();

        if ($user_basket != null) {
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
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        return response()->json($result);
    }

    public function showBasket(Request $request)
    {
        $request->basket = UserBasket::leftJoin('product', 'product.product_id', '=', 'user_basket.product_id')
            ->where('user_id', Auth::user()->user_id)
            ->where('user_basket.is_active', 0)
            ->select('product.*', 'user_basket.unit')
            ->get();

        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();

        return view('admin.online-shop.basket', [
            'row' => $request
        ]);
    }

    public function deleteProductFromBasket(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();
        $user_basket->delete();

        $sum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            $sum += $product_price->product_price * $item->unit;
        }

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        $result['sum'] = $sum;
        return response()->json($result);
    }

    public function setProductUnit(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if ($product == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket = UserBasket::where('user_id', Auth::user()->user_id)->where('product_id', $product_id)->where('is_active', 0)->first();
        if ($user_basket == null) {
            $result['error'] = 'Такого товара не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $user_basket->unit = $request->unit;
        $user_basket->save();

        $sum = 0;
        $ballSum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            $sum += $product_price->product_price * $item->unit;
            $ballSum += $product_price->ball * $item->unit;
        }

        $result['message'] = 'Вы успешно отправили запрос';
        $result['count'] = $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();
        $result['status'] = true;
        $result['sum'] = $sum;
        $result['ballSum'] = $ballSum;
        return response()->json($result);
    }

    public function confirmBasket()
    {
        $sum = 0;
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product_price = Product::where('product_id', $item->product_id)->first();
            $sum += $product_price->product_price * $item->unit;
        }

        if (Auth::user()->user_money < $sum) {
            $result['error'] = 'У вас недостаточно средств';
            $result['status'] = false;
            return response()->json($result);
        }

        $user = Auth::user();
        $products = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->get();
        foreach ($products as $item) {
            $product = Product::where('product_id', $item->product_id)->first();
            $user_basket = UserBasket::where('user_basket_id', $item->user_basket_id)->first();
            $user_basket->product_price = $product->product_price;
            $user_basket->is_active = 1;
            $user_basket->save();

                $user_id = $user->recommend_user_id;


            $counter = 0;
            while ($user_id != null) {
                $counter++;
                $parent = Users::where('user_id', $user_id)->first();
                if ($parent == null) break;
                $user_id = $parent->recommend_user_id;
                $percent = 0;
                if ($counter == 1) $percent = 20;
                elseif ($counter == 2) $percent = 5;
                elseif ($counter == 3) $percent = 5;
                elseif ($counter == 4) $percent = 10;
                elseif ($counter == 5) $percent = 10;

                $cash = ($product->product_price * $item->unit) * $percent / 100;

                if ($cash > 0) {
                    $parent->user_money += $cash;
                    $parent->save();

                    $operation = new UserOperation();
                    $operation->author_id = $user->user_id;
                    $operation->recipient_id = $parent->user_id;
                    $operation->money = $cash;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 22;
                    $operation->operation_comment = $cash . '$';
                    $operation->save();
                }


                if ($counter == 5) {
                    break;
                }
            }

        }

        $user = Auth::user();
        $user->user_money = $user->user_money - $sum;
        $user->save();

        $operation = new UserOperation();
        $operation->author_id = null;
        $operation->recipient_id = $user->user_id;
        $operation->money = $sum * -1;
        $operation->operation_id = 2;
        $operation->operation_type_id = 21;
        $operation->operation_comment = '';
        $operation->save();


        $result['status'] = true;
        return response()->json($result);
    }

    public function showHistory(Request $request)
    {
        $request->basket = UserBasket::leftJoin('product', 'product.product_id', '=', 'user_basket.product_id')
            ->where('user_id', Auth::user()->user_id)
            ->where('user_basket.is_active', 1)
            ->orderBy('user_basket_id', 'desc')
            ->select('product.*',
                'user_basket.unit',
                'user_basket.product_price',
                DB::raw('DATE_FORMAT(user_basket.created_at,"%d.%m.%Y %H:%i") as date'))
            ->get();

        $request->basket_count = UserBasket::where('user_id', Auth::user()->user_id)->where('is_active', 0)->count();

        return view('admin.online-shop.history', [
            'row' => $request
        ]);
    }
}
