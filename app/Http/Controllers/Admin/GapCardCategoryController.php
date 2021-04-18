<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GapCardCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GapCardCategoryController extends Controller
{
    public function index()
    {
        $gapCardCategories = GapCardCategory::all();
        return view('admin.gap.card.category.index', [
            'gapCardCategories' => $gapCardCategories,
        ]);
    }

    public function create()
    {
        return view('admin.gap.card.category.create');
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

        if (GapCardCategory::create($request->all())) {
            $request->session()->flash('success', 'Вы успешно добавили категорию');
            return redirect(route('gap_category.index'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $gapCategory = GapCardCategory::find($id);
        return view('admin.gap.card.category.edit', compact('gapCategory'));
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
        $gapCardCategory = GapCardCategory::where(['id' => $id])->first();
        if ($gapCardCategory->update($request->all())) {
            $request->session()->flash('success', 'Вы успешно изменили категорию');
            return redirect(route('gap_category.index'));
        }
    }

    public function destroy($id)
    {
        GapCardCategory::where(['id' => $id])->delete();
        session()->flash('success', 'Вы успешно удалили категорию');
        return redirect(route('gap_category.index'));
    }
}
