<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GapCardCategory;
use App\Models\GapCardItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GapCardItemController extends Controller
{
    public function index()
    {
        $gapCardItem = GapCardItem::all();
        return view('admin.gap.card.item.index', compact('gapCardItem'));

    }

    public function create()
    {
        return view('admin.gap.card.item.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Необходимо заполнить поле :attribute',
            'min:5' => 'Минимальное количество символов должно быть 5'
        ];

        $validator = Validator::make($request->all(), [
            'title_kz' => 'required|min:3',
            'title_ru' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_percentage' => 'required',
            'price' => 'required',
            'gap_card_sub_category_id' => 'required',
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

        $image = '';
        $destinationPath = public_path('admin/image/gap_item/');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        }

        if (GapCardItem::create([
            'title_kz' => $request->title_kz,
            'title_ru' => $request->title_ru,
            'description_kz' => $request->description_kz,
            'description_ru' => $request->description_ru,
            'image' => $name,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage,
            'gap_card_sub_category_id' => $request->gap_card_sub_category_id,
        ])) {
            $request->session()->flash('success', 'Вы успешно добавили центр!   ');
            return redirect(route('gap_item.index'));
        }
    }


    public function edit($id)
    {
        $gapCardItem = GapCardItem::where(['id' => $id])->first();
        return view('admin.gap.card.item.edit', compact('gapCardItem'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Необходимо заполнить поле :attribute',
            'min:5' => 'Минимальное количество символов должно быть 5'
        ];

        $validator = Validator::make($request->all(), [
            'title_kz' => 'required|min:3',
            'title_ru' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_percentage' => 'required',
            'price' => 'required',
            'gap_card_sub_category_id' => 'required',
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

        $gapCardItem = GapCardItem::where(['id' => $id])->first();
        $name = $gapCardItem->image;
        $destinationPath = public_path('admin/image/gap_item/');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        }

        if ($gapCardItem->update([
            'title_kz' => $request->title_kz,
            'title_ru' => $request->title_ru,
            'description_kz' => $request->description_kz,
            'description_ru' => $request->description_ru,
            'image' => $name,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage,
            'gap_card_sub_category_id' => $request->gap_card_sub_category_id,
        ])) {
            $request->session()->flash('success', 'Вы успешно добавили центр!   ');
            return redirect(route('gap_item.index'));
        }
    }

    public function destroy($id)
    {
        //
    }
}
