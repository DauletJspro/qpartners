<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $row = Product::where(function ($query) use ($request) {
            $query->where('product_name_kz', 'like', '%' . $request->search . '%')
                ->orWhere('product_name_ru', 'like', '%' . $request->search . '%')
                ->orWhere('product_name_en', 'like', '%' . $request->search . '%');
        })
            ->orderBy('product_id', 'desc')
            ->select('product.*',
                DB::raw('DATE_FORMAT(product.created_at,"%d.%m.%Y %H:%i") as date'));

        if (isset($request->active))
            $row->where('is_show', $request->active);
        else $row->where('is_show', '1');

        $row = $row->paginate(20);

        return view('admin.product.product', [
            'row' => $row,
            'request' => $request
        ]);
    }

    public function create()
    {
        $row = new Product();
        $row->product_image = '/media/default.jpg';

        return view('admin.product.product-edit', [
            'title' => 'Добавить товар',
            'row' => $row
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name_ru' => 'required',
            'category' => 'required',
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
        $product->sort_num = ($request->sort_num == '') ? 1000 : $request->sort_num;
        $product->category_id = $request->category;
        $product->save();

        return redirect('/admin/product');
    }

    public function edit($id)
    {
        $row = Product::select('product.*')
            ->where('product.product_id', $id)
            ->first();

        return view('admin.product.product-edit', [
            'title' => 'Изменить продукт',
            'row' => $row
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name_ru' => 'required',
            'category' => 'required',
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

        $product = Product::find($id);
        $product->product_name_ru = $request->product_name_ru;
        $product->product_price = is_numeric($request->product_price) ? $request->product_price : 0;
        $product->product_cash = is_numeric($request->product_cash) ? $request->product_cash : 0;
        $product->product_desc_ru = $request->product_desc_ru;
        $product->product_image = $request->product_image;
        $product->ball = $request->ball;
        $product->is_new = isset($request->is_new) ? true : false;
        $product->is_popular = isset($request->is_popular) ? true : false;
        $product->is_show_in_header = $request->is_show_in_header ? true : false;
        $product->sort_num = ($request->sort_num == '') ? 1000 : $request->sort_num;
        $product->category_id = $request->category;
        $product->save();

        return redirect('/admin/product');
    }

    public function destroy($id)
    {
        $news = Product::find($id);
        $news->delete();
    }

    public function detail()
    {

    }
}
