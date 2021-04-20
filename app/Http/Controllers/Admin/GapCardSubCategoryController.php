<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GapCardCategory;
use App\Models\GapCardSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GapCardSubCategoryController extends Controller
{
    public function index()
    {
        $gapCardSubCategories = GapCardSubCategory::all();
        return view('admin.gap.card.sub_category.index', compact('gapCardSubCategories'));

    }

    public function create()
    {
        return view('admin.gap.card.sub_category.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Необходимо заполнить поле :attribute',
            'min:5' => 'Минимальное количество символов должно быть 5'
        ];

        $validator = Validator::make($request->all(), [
            'title_kz' => 'required|min:5',
            'title_ru' => 'required|min:5',
        ], $messages);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $errors = $messages->all();
            $errorResults = 'Необходимо исправить следующие ошибки' . '<br>';
            foreach ($errors as $error) {
                $errorResults .= '&nbsp;' . $error . '<br>';
            }

            $request->session()->flash('danger', $errorResults);
            return back();
        }

        if (GapCardSubCategory::create($request->all())) {
            $request->session()->flash('success', 'Вы успешно добавили под категорию');
            return redirect(route('gap_sub_category.index'));
        }
    }

    public function edit($id)
    {
        $gapCardSubCategory = GapCardSubCategory::find($id);
        return view('admin.gap.card.sub_category.edit', compact('gapCardSubCategory'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Необходимо заполнить поле :attribute',
            'min:5' => 'Минимальное количество символов должно быть 5'
        ];

        $validator = Validator::make($request->all(), [
            'title_kz' => 'required|min:5',
            'title_ru' => 'required|min:5',
        ], $messages);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $errors = $messages->all();
            $errorResults = 'Необходимо исправить следующие ошибки' . '<br>';
            foreach ($errors as $error) {
                $errorResults .= '&nbsp;' . $error . '<br>';
            }

            $request->session()->flash('danger', $errorResults);
            return back();
        }

        $gapCardSubCategory = GapCardSubCategory::where(['id' => $id])->first();

        if ($gapCardSubCategory->update($request->all())) {
            $request->session()->flash('success', 'Вы успешно изменили под категорию');
            return redirect(route('gap_sub_category.index'));
        }
    }

    public function destroy($id)
    {
        GapCardSubCategory::where(['id' => $id])->delete();
    }
}
