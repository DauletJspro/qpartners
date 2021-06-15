<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EntrepreneurRequest;
use App\Models\City;
use App\Models\Entrepreneur;
use App\Models\GapCardItem;
use App\Models\GapCardSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function createBanner(){
        $gapCardSubCategories = GapCardSubCategory::all()->pluck('title_ru', 'id')->toArray();
        $cityList = City::where('is_show', true)->pluck('city_name_ru', 'city_id')->toArray();
      return view('admin.banner-entrepreneur.create.create',
          compact('gapCardSubCategories', 'cityList'));
    }

    // Функция записывает информация о баннере в таблицу 'qap_card_items'
    public function storeBanner(EntrepreneurRequest $request){
        $data = Entrepreneur::setImageAndReturnData($request); #TODO
        $result = GapCardItem::create($data);
        if (!$result){
            return redirect()->back()->with('danger', 'Danger');
        }
        return redirect()->back()->with('success', 'Success');
    }

    // Список баннеров для администратора
    public function listBanner(){
        $cardList = GapCardItem::where('is_checked', 0)->paginate(10);
        return view('admin.banner-entrepreneur.admin.list', compact('cardList'));
    }

    public function acceptBanner(Request $request){
        Entrepreneur::setIsChecked($request);
        $result['message'] = 'Вы успешно приняли запрос';
        $result['status'] = true;
        return response()->json($result);

    }
}
