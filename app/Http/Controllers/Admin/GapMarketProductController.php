<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GapMarketProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $row = Product::where('user_id', Auth::user()->user_id)->paginate(20);

        return view('admin.gap_market.product.product', [
            'row' => $row,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = new Product();
        $row->product_image = '/media/default.jpg';
        $row->is_new = 0;
        $row->is_popular = 0;

        return view('admin.product.product-edit', [
            'title' => 'Добавить товар',
            'row' => $row
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name_ru' => 'required',
            'sub_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return view('admin.product.product-edit', [
                'title' => 'Добавить товар',
                'row' => (object)$request->all(),
                'error' => $error[0]
            ]);
        }

        $product = new Product();
        $product->product_name_ru = $request->product_name_ru;
        $product->product_price = is_numeric($request->product_price) ? $request->product_price : 0;
        $product->product_cash = is_numeric($request->product_cash) ? $request->product_cash : 0;
        $product->product_desc_ru = $request->product_desc_ru;
        $product->product_image = $request->product_image;
        $product->ball = $request->ball;
        $product->is_new = isset($request->is_new) ? true : false;
        $product->is_popular = isset($request->is_popular) ? true : false;
        $product->is_show_in_header = $request->is_show_in_header ? true : false;
        $product->item_id = $request->item_id;
        $product->full_description_ru = $request->full_description_ru;
        $product->information = $request->information;
        $product->composition = $request->composition;
        $product->sort_num = ($request->sort_num == '') ? 1000 : $request->sort_num;
        $product->sub_category_id = $request->sub_category_id;
        $product->city_id = 8;
        $product->user_id = Auth::user()->user_id   ;
        $product->save();

        return redirect()->route('gap_market_product.create')->with('success', 'Вы добавили продукт '.$request->product_name_ru." успешно.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $row = Product::where(['product_id' => $productId])->first();


        return view('admin.product.product-edit', [
            'title' => 'Изменить продукт',
            'row' => $row
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'product_name_ru' => 'required',
            'sub_category_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return view('admin.product.product-edit', [
                'title' => 'Изменить продукт',
                'row' => (object)$request->all(),
                'error' => $error[0]
            ]);
        }

        $product = Product::find($productId);
        $product->product_name_ru = $request->product_name_ru;
        $product->product_price = is_numeric($request->product_price) ? $request->product_price : 0;
        $product->product_cash = is_numeric($request->product_cash) ? $request->product_cash : 0;
        $product->product_desc_ru = $request->product_desc_ru;
        $product->product_image = $request->product_image;
        $product->ball = $request->ball;
        $product->is_new = isset($request->is_new) ? true : false;
        $product->is_popular = isset($request->is_popular) ? true : false;
        $product->is_show_in_header = $request->is_show_in_header ? true : false;
        $product->item_id = $request->item_id;
        $product->full_description_ru = $request->full_description_ru;
        $product->information = $request->information;
        $product->composition = $request->composition;
        $product->sort_num = ($request->sort_num == '') ? 1000 : $request->sort_num;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        return redirect()->back()->with('success', 'Вы изменили продукт '.$request->product_name_ru." успешно.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $product = Product::find($productId);
        if(Auth::check()){
            $product = Product::where(['product_id'=>$product->product_id,'user_id'=>Auth::user()->user_id]);
            if($product->delete()){
                return 1;
            }else {
                return 2;
            }
        }else {
            return 3;
        }
    }
}
