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

        $programs = collect([
                [
                    'id' => 1,
                    'name' => 'Baspana plus',
                    'imgSrc'=> "baspana-plus.jpg",
                    'body'=> "BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 1,
                    'entrance_fee' => '240 000 тг',
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'от 1 до 6 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Внести',
                    'initial_fee' => '30%, 50% или 70% ',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде первоначального взноса',
                    'example1' => '9 000 000 тенге',
                    'example2' => '50%',
                    'example3' => '240 000 тенге',
                    'example4' => '4 500 000 тенге (50%)',
                    'example5' => '4 500 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '60 месяцев',
                    'example8' => '(75 000 х 60 = 4 500 000)',
                ],
                [
                    'id' => 2,
                    'name' => 'Tulpar plus',
                    'imgSrc'=> "tulpar-plus.jpg",
                    'body'=> "TULPAR PLUS - автомобиль мечты в рассрочку с первоначальным взносом",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '240 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 1,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 60 месяцев',
                    'term_form_receiving_installments' => 'от 1 до 6 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Внести',
                    'initial_fee' => '30%, 50% или 70% ',
                    'ex' => 'жилья',
                    'program_type' => 'автомобиль в виде первоначального взноса',
                    'example1' => '6 000 000 тенге',
                    'example2' => '30%',
                    'example3' => '240 000 тенге',
                    'example4' => '1 800 000 тенге (30%)',
                    'example5' => '4 200 000 тенге',
                    'installment_type' => 'автомобиль',
                    'example6' => '75 000 тенге',
                    'example7' => '56 месяцев',
                    'example8' => '(75 000 х 56 = 4 200 000)',
                ],
                [
                    'id' => 3,
                    'name' => 'Baspana',
                    'imgSrc'=> "baspana.jpg",
                    'body'=> "BASPANA - жилье для большой семьи в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '240 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'через 12 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде накопительно-паевого взноса',
                    'example1' => '9 000 000 тенге',
                    'example2' => '12 месяцев',
                    'example3' => '70 000 тенге',
                    'example4' => '900 000 тенге (10%)',
                    'example5' => '8 100 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '108 месяцев',
                    'example8' => '(75 000 х 108 = 8 100 000)',
                ],
                [
                    'id' => 4,
                    'name' => 'Tulpar',
                    'imgSrc'=> "tulpar.jpg",
                    'body'=> "TULPAR - автомобиль для всей семьи в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '240 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'от 3 000 000 тенге',
                    'installment_term' => 'до 60 месяцев',
                    'term_form_receiving_installments' => 'через 6 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'автомобиля',
                    'program_type' => 'автомобиль в виде накопительно-паевого взноса',
                    'example1' => '3 000 000 тенге',
                    'example2' => '6 месяцев',
                    'example3' => '50 000 тенге',
                    'example4' => '300 000 тенге (10%)',
                    'example5' => '2 700 000 тенге',
                    'installment_type' => 'автомобиль',
                    'example6' => '50 000 тенге',
                    'example7' => '54 месяцев',
                    'example8' => '(50 000 х 54 = 2 700 000)',
                ],
                [
                    'id' => 5,
                    'name' => 'Jastar',
                    'imgSrc'=> "jastar.jpg",
                    'body'=> "JASTAR - жилье для молодежи в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '60 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'через 30 месяцев',
                    'age' => 'молодёжь в возрасте от 18 до 29 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде накопительно-паевого взноса',
                    'example1' => '6 000 000 тенге',
                    'example2' => '30 месяцев',
                    'example3' => '20 000 тенге',
                    'example4' => '600 000 тенге (10%)',
                    'example5' => '5 400 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '72 месяцев',
                    'example8' => '(75 000 х 72 = 5 400 000)',
                ],
                [
                    'id' => 6,
                    'name' => 'Jas-otau',
                    'imgSrc'=> "jas-otau.jpg",
                    'body'=> "JAS OTAU - жилье для молодых семей в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '120 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'через 30 месяцев',
                    'age' => 'семейные пары в возрасте от 18 до 35 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде накопительно-паевого взноса',
                    'example1' => '8 000 000 тенге',
                    'example2' => '18 месяцев',
                    'example3' => '44 444 тенге',
                    'example4' => '800 000 тенге (10%)',
                    'example5' => '7 200 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '96 месяцев',
                    'example8' => '(75 000 х 96 = 7 200 000)',
                ],
                [
                    'id' => 7,
                    'name' => 'Qoldau',
                    'imgSrc'=> "qoldau.jpg",
                    'body'=> "QOLDAU - жилье медработников и учителей в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '120 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'через 24 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде накопительно-паевого взноса',
                    'example1' => '7 000 000 тенге',
                    'example2' => '24 месяцев',
                    'example3' => '29 166 тенге',
                    'example4' => '700 000 тенге (10%)',
                    'example5' => '6 300 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '84 месяцев',
                    'example8' => '(75 000 х 84 = 6 300 000)',
                ],
                [
                    'id' => 8,
                    'name' => 'Qamqor',
                    'imgSrc'=> "qamqor.jpg",
                    'body'=> "QAMQOR - жилье для социально уязвимых слоев населения в рассрочку",
                    'description' => 'BASPANA PLUS - собственное жилье в рассрочку с первоначальным взносом',
                    'about_program' => 'Программа по предоставлению жилья в рассрочку с первоначальным взносом',
                    'entrance_fee' => '60 000 тг',
                    'rating' => 3.5,
                    'like' => 2,
                    'comment' => 2093,
                    'category_id'=> 2,
                    'installment_amount' => 'до 9 000 000 тенге',
                    'installment_term' => 'до 120 месяцев',
                    'term_form_receiving_installments' => 'через 24 месяцев',
                    'age' => 'лица старше 18 лет',
                    'deposit' => 'Накопить',
                    'initial_fee' => '10%',
                    'ex' => 'жилья',
                    'program_type' => 'жилье в виде накопительно-паевого взноса',
                    'example1' => '5 000 000 тенге',
                    'example2' => '24 месяцев',
                    'example3' => '20 833 тенге',
                    'example4' => '500 000 тенге (10%)',
                    'example5' => '4 500 000 тенге',
                    'installment_type' => 'жилье',
                    'example6' => '75 000 тенге',
                    'example7' => '60 месяцев',
                    'example8' => '(75 000 х 60 = 4 500 000)',
                ],
            ]
        );
        foreach ($programs as $eachProgram) {
            if($eachProgram['id'] == $id) {
                $chosenProgram = $eachProgram;
                break;
            }
        }
        return view('design_index.programs.programsDetail', [
            'chosen_program' => $chosenProgram,
            'programs' => $programs
            ]);
    }
}
