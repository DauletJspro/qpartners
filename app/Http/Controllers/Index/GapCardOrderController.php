<?php

namespace App\Http\Controllers\Index;

use App\Models\CardOrder;
use App\Models\Currency;
use App\Models\Rating;
use App\Models\UserOperation;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GapCardItem;
use App\Http\Requests\GapCardOrderRequest;
use Illuminate\Support\Facades\Auth;

class GapCardOrderController extends Controller
{
    public function confirm($cardId)
    {
        //Подверждение
        $gap_card = GapCardItem::findOrFail($cardId);
        $exist = CardOrder::where('user_id', Auth::user()->user_id)->where('gap_card_id', $gap_card->id)->first();

        //Если карта уже была куплена
        if(isset($exist)){
            return redirect()->route('gap_card.detail', $gap_card->id)->with('danger', "Вы уже преобрели данную карту!");
        }
        // Проверка на баланс клиента
        if(Auth::user()->user_money < $gap_card->price ){
            return redirect()->route('gap_card.detail', $gap_card->id)->with('danger', "У вас не достаточно средств для покупки данной карты, пополните ваш баланс");
        }else{
            return view('design_index.gap.gap_order.confirm', compact('gap_card'));
        }
    }
    //Создание нового заказа
    public function create(Request $request)
    {
        $data = $request->all();

        $card = GapCardItem::find($request->gap_card_id);
        $rating = Rating::where('user_id', Auth::user()->user_id)->where('gap_card_id', $card->id)->first();
        $price = Auth::user()->user_money - $card->price;
        $exist = CardOrder::where('user_id', Auth::user()->user_id)->where('gap_card_id', $card->id)->first();

        if (Auth::user()->user_money >= $card->price && !isset($exist)){
            //cashback и создание заказа в таблице card_orders
            $success = CardOrder::create($data) && Users::cashbackBonusConsumer($card);
        }

        //Отправка сообщение при успешной созданий данных в БД
        if($success){
            if($rating){
                Auth::user()->update(["user_money" => $price]);
                return redirect()->route('gap_card.detail', $card->id)->with('success', "Спасибо за покупку карты ". $card->title_ru);
            }else{
                Auth::user()->update(["user_money" => $price]);
                return redirect()->route('gap_card.detail', $card->id)->with('success', "Спасибо за покупку карты! ". $card->title_ru . " Поставьте рейтинг от 1 до 5 на эту карту");
            }
        }else {
            return redirect()->route('gap_card.detail', $card->id)->with('danger', "Что-то пошло не так, пожалуйста повторите попытку.");
        }
    }
}


