<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvantagesController extends Controller
{
    public function index()
    {
        $myarray= collect([
                [
                    'imgSrc'=> "pair-of-bills1.png",
                    'body'=> "Рассрочка без процентов"
                ],
                [
                    'imgSrc'=> "give-money1.png",
                    'body'=> "Отсутствие переплат и комиссии"
                ],
                [
                    'imgSrc'=> "dollar-symbol1.png",
                    'body'=> "Без подтверждения дохода"
                ],
                [
                    'imgSrc'=> "sand-clock1.png",
                    'body'=> "Без срока ожидания"
                ],
                [
                    'imgSrc'=> "payment-method1.png",
                    'body'=> "Вступительный взнос от 60 000 тенге"
                ],
                [
                    'imgSrc'=> "coin1.png",
                    'body'=> "Возможность выбора первоначальный или накопительно-паевый взнос"
                ],
                [
                    'imgSrc'=> "piggy-bank1.png",
                    'body'=> "Накопительно-паевый взнос от 10 000 тенге в месяц"
                ],
                [
                    'imgSrc'=> "discount1.png",
                    'body'=> "Первоначальный взнос от 30%"
                ],
                [
                    'imgSrc'=> "monthly-calendar1.png",
                    'body'=> "Срок получения рассрочки от 1 месяца"
                ],
                [
                    'imgSrc'=> "tag1.png",
                    'body'=> "Бонус для участников=> комплекс натуральной продукции в подарок"
                ],
                [
                    'imgSrc'=> "badge1.png",
                    'body'=> "Срок рассрочки до 120 месяцев"
                ],
                [
                    'imgSrc'=> "shopping-online1.png",
                    'body'=> "Возможность оплаты онлайн, через приложения и терминалы"
                ],
                [
                    'imgSrc'=> "secure1.png",
                    'body'=> "Сохранность ваших взносов"
                ],
                [
                    'imgSrc'=> "contract1.png",
                    'body'=> "Гарантия возврата накопительно-паевых или первоначального взноса в полном объеме при расторжении договора"
                ],
                [
                    'imgSrc' => "mallet1.png",
                    'body'=> "Открытость и прозрачная деятельность кооператива в рамках закона"
                ],
            ]
        );
        return view('design_index.advantages.index', compact('myarray'));
    }
}
