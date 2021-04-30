<?php

namespace App\Http\Controllers\Index;

use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function initial()
    {
        $programs= collect([
                [
                    'id' => 1,
                    'imgSrc'=> "baspana-plus.jpg",
                    'body'=> "BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом"
                ],
                [
                    'id' => 2,
                    'imgSrc'=> "tulpar-plus.jpg",
                    'body'=> "TULPAR PLUS - автомобиль мечты в рассрочку с первоначальным взносом"
                ],
            ]
        );

        return view('design_index.programs.initial', ['programs' => $programs]);
    }
    public function share()
    {
        $programs= collect([
                [
                    'id' => 3,
                    'imgSrc'=> "baspana.jpg",
                    'body'=> "BASPANA - жилье для большой семьи в рассрочку"
                ],
                [
                    'id' => 4,
                    'imgSrc'=> "tulpar.jpg",
                    'body'=> "TULPAR - автомобиль для всей семьи в рассрочку"
                ],
                [
                    'id' => 5,
                    'imgSrc'=> "jastar.jpg",
                    'body'=> "JASTAR - жилье для молодежи в рассрочку"
                ],
                [
                    'id' => 6,
                    'imgSrc'=> "jas-otau.jpg",
                    'body'=> "JAS OTAU - жилье для молодых семей в рассрочку"
                ],
                [
                    'id' => 7,
                    'imgSrc'=> "qoldau.jpg",
                    'body'=> "QOLDAU - жилье медработников и учителей в рассрочку"
                ],
                [
                    'id' => 8,
                    'imgSrc'=> "qamqor.jpg",
                    'body'=> "QAMQOR - жилье для социально уязвимых слоев населения в рассрочку"
                ],
            ]
        );

        return view('design_index.programs.share', ['programs' => $programs]);

    }
    public function programsDetail($id) {
        return view('design_index.programs.programsDetail', [
            'chosen_program' => [
                'id' => 1,
                'name' => 'Baspana plus',
                'imgSrc'=> 'baspana-plus.jpg',
                'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                'entrance_fee' => '240 000 тг',
                'rating' => 3.5,
                'like' => 2,
                'comment' => 2093,
                'category_id' => 1, //с первоначальным взносом
            ],
            'programs' => collect([
                    [
                        'id' => 1,
                        'imgSrc'=> "baspana-plus.jpg",
                        'body'=> "BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом",
                        'category_id'=> 1,
                    ],
                    [
                        'id' => 2,
                        'imgSrc'=> "tulpar-plus.jpg",
                        'body'=> "TULPAR PLUS - автомобиль мечты в рассрочку с первоначальным взносом",
                        'category_id'=> 1,
                    ],
                    [
                        'id' => 3,
                        'imgSrc'=> "baspana.jpg",
                        'body'=> "BASPANA - жилье для большой семьи в рассрочку",
                        'category_id'=> 2,
                    ],
                    [
                        'id' => 4,
                        'imgSrc'=> "tulpar.jpg",
                        'body'=> "TULPAR - автомобиль для всей семьи в рассрочку",
                        'category_id'=> 2,
                    ],
                    [
                        'id' => 5,
                        'imgSrc'=> "jastar.jpg",
                        'body'=> "JASTAR - жилье для молодежи в рассрочку",
                        'category_id'=> 2,
                    ],
                    [
                        'id' => 6,
                        'imgSrc'=> "jas-otau.jpg",
                        'body'=> "JAS OTAU - жилье для молодых семей в рассрочку",
                        'category_id'=> 2,
                    ],
                    [
                        'id' => 7,
                        'imgSrc'=> "qoldau.jpg",
                        'body'=> "QOLDAU - жилье медработников и учителей в рассрочку",
                        'category_id'=> 2,
                    ],
                    [
                        'id' => 8,
                        'imgSrc'=> "qamqor.jpg",
                        'body'=> "QAMQOR - жилье для социально уязвимых слоев населения в рассрочку",
                        'category_id'=> 2,
                    ],
                ]
            )]);
    }
}
