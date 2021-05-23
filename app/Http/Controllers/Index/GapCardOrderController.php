<?php

namespace App\Http\Controllers\Index;

use App\Models\CardOrder;
use App\Models\Rating;
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
        if(Auth::user()->balance->user_balance < $gap_card->price ){
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
        $price = Auth::user()->balance->user_balance - $card->price;
        $exist = CardOrder::where('user_id', Auth::user()->user_id)->where('gap_card_id', $card->id)->first();

        if (Auth::user()->balance->user_balance >= $card->price && !isset($exist)){
            $success = CardOrder::create($data);
        }

        //cashback and user_money для активных спонсоров
        $recommend_user_id = Auth::user()->recommend_user_id;
        if($success) {
            for ($i=0; $i<8; $i++){
                $recommend_user = Users::where('user_id',$recommend_user_id)->where('is_activated', true)->first();
                $user_cash = $recommend_user->user_cash;
                $user_money = $recommend_user->user_money;
                $BONUS_20 = $card->price * 0.2;
                $BONUS_5 = $card->price * 0.05;
                $recommend_user_id = $recommend_user->recommend_user_id;
                if ($i == 0 ){
                    $user_money = $user_money + $BONUS_20;
                    $recommend_user->update([
                        'user_money' => $user_money
                    ]);
                }else{
                    $cashback = $user_cash + $BONUS_5;
                    $recommend_user->update([
                        'user_cash' => $cashback
                    ]);
                }
            }
        }

        //Отправка сообщение при созданий данных

        if($success){
            if($rating){
                Auth::user()->balance->update(["user_balance" => $price]);
                return redirect()->route('gap_card.detail', $card->id)->with('success', "Спасибо за покупку карты ". $card->title_ru);
            }else{
                Auth::user()->balance->update(["user_balance" => $price]);
                return redirect()->route('gap_card.detail', $card->id)->with('success', "Спасибо за покупку карты! ". $card->title_ru . " Поставьте рейтинг от 1 до 5 на эту карту");
            }
        }else {
            return redirect()->route('gap_card.detail', $card->id)->with('danger', "Что-то пошло не так, пожалуйста повторите попытку.");
        }
    }
}
