<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GapCardItemRequest;
use App\Models\GapCardCategory;
use App\Models\GapCardItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GapCardItemController extends Controller
{
    public function index()
    {
        $gapCardItems = GapCardItem::where('user_id', Auth::user()->user_id)->orderBy('created_at','desc')->paginate(40);
        return view('admin.gap.card.item.index', compact('gapCardItems'));

    }

    public function create()
    {
        return view('admin.gap.card.item.create');
    }

    public function store(GapCardItemRequest $request)
    {
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
            'user_id' => Auth::user()->user_id
        ])) {
            $request->session()->flash('success', 'Вы успешно добавили центр!   ');
            return redirect(route('gap_item.index'));
        }else{
            $request->session()->flash('warning', 'Что то пошло не так повторите попытку!   ');
            return redirect(route('gap_item.index'));
        }
    }


    public function edit($id)
    {
        $gapCardItem = GapCardItem::where(['id' => $id])->first();
        return view('admin.gap.card.item.edit', compact('gapCardItem'));
    }

    public function update(GapCardItemRequest $request, $id)
    {
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
            $request->session()->flash('success', 'Вы успешно изменили центр!   ');
            return redirect(route('gap_item.index'));
        }else{
            $request->session()->flash('warning', 'Что то пошло не так повторите попытку!   ');
            return redirect(route('gap_item.index'));
        }
    }

    public function destroy($gapItemId)
    {
        $gapItem = GapCardItem::find($gapItemId);
        if(Auth::check()){
            $gapItem = GapCardItem::where(['id'=>$gapItem->id]);
            if($gapItem->delete()){
                return 1;
            }else {
                return 2;
            }
        }else {
            return 3;
        }
    }
}
