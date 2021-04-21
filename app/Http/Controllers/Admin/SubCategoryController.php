<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminWebsite');
    }

    public function index()
    {
        $subCategories = SubCategory::all();
        return view('admin.sub_category.index', [
            'subCategories' => $subCategories
        ]);
    }

    public function create()
    {

        return view('admin.sub_category.create');
    }

    public function store(Request $request)
    {

        $messages = array(
            'required' => 'Необходимо заполнить поле "Название категорий"',
            'max' => 'Максимальное длинна название 100 символов'
        );

        $validator = Validator::make($request->all(),
            [
                'title_kz' => 'required|max:100',
                'title_ru' => 'required|max:100',
                'category_id' => 'required',
            ]
            , $messages);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return view('admin.sub_category.create', [
                'error' => $error[0],
            ]);
        }

        $category = new SubCategory();
        $category->fill($request->all());

        if ($category->save()) {
            return redirect('/admin/sub_category');
        }

    }

    public function edit($id)
    {
        $category = SubCategory::where(['id' => $id])->first();
        return view('admin.sub_category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {

        $messages = array(
            'required' => 'Необходимо заполнить поле "Название категорий"',
            'max' => 'Максимальное длинна название 100 символов'
        );

        $validator = Validator::make($request->all(),
            [
                'title_kz' => 'required|max:100',
                'title_ru' => 'required|max:100',
                'category_id' => 'required',
            ]
            , $messages);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return view('admin.sub_category.create', [
                'error' => $error[0],
            ]);
        }

        $category = SubCategory::find($id);
        $category->fill($request->all());

        if ($category->save()) {
            return redirect('/admin/sub_category');
        }
    }

    public function destroy($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
    }
}
