<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GapMarketProductRequest;
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
        $product = Product::paginate(20);
        return view('admin.gap_market.product.product', [
            'product' => $product,
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
        return view('admin.gap_market.product.product-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GapMarketProductRequest $request)
    {
        $data = $request->all();
        $success = Product::create($data);

        if($success) {
            return redirect()->route('gap_market_product.create')->with('success', "Вы добавили товар ".$request->product_name_ru." успешно.");
        }else{
            return redirect()->route('gap_market_product.create')->with('warning', "Товар ".$request->product_name_ru." не был добавлен пожалуйста повторите попытку.");
        }
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
        $product = Product::where(['product_id' => $productId])->first();

        return view('admin.gap_market.product.product-edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GapMarketProductRequest $request, $productId)
    {
        $product = Product::find($productId);
        $data = $request->all();
        $success = $product->update($data);
        if($success)
        {
            return redirect()->back()->with('success', "Вы изменили товар ".$request->product_name_ru." успешно.");
        }else{
            return redirect()->back()->with('warning', "Товар ".$request->product_name_ru." не был добавлен пожалуйста повторите попытку.");
        }


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
            $product = Product::where(['product_id'=>$product->product_id]);
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
