<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->where('id', '=', 4)->update([
                  'answer' => 'Головной офис компании QYRAN PARTNERS CLUB находится по адресу г. Шымкент, ул. Кабанбай 
                  батыра, 28Б'
        ]);

        DB::table('faqs')->where('id', '=', 10)->update([
            'answer' => 'Компания QYRAN PARTNERS CLUB предлагает Вам уникальный и щедрый маркетинг, широкий ассортимент 
            натуральной продукции для здоровья и для дома. Также, Вы можете приобрести жилье и автомобиль за счет 
            компании в рассрочку в рамках социальной программы GAP.'
        ]);

        DB::table('faqs')->where('id', '=', 11)->update([
            'answer' => 'Компания QYRAN PARTNERS CLUB отдает 80% прибыли в сеть в виде бонусов и вознаграждении. Также, 
            особенностью маркетинг плана является то, что Вы будете получать вознаграждения по 8 видам бонусов 
            моментально.'
        ]);

        DB::table('faqs')->where('id', '=', 12)->update([
            'question' => 'Какие 8 видов бонусов предлагает компания QYRAN PARTNERS CLUB?',
            'answer' => 'Согласно маркетинг плану компании Вы будете получать доход по следующим видам бонусов: 1. 
            Рекрутинговый бонус 2. Структурный бонус 3. Cash Back бонус 4. Активационный бонус 5. Квалификационный 
            бонус. 6. Global бонус. 7. Лидерский бонус. 8. Социальный бонус.'
        ]);

        DB::table('faqs')->where('id', '=', 13)->update([
            'question' => 'Что такое социальная программа GAP?',
            'answer' => 'Социальная программа GAP - это Ваша возможность приобрести жилье и автомобиль за счет компании 
            (подарок) или в рассрочку, без комиссии, без переплат, без процентов и без подтверждения дохода.'
        ]);

        DB::table('faqs')->where('id', '=', 14)->update([
            'question' => 'Что надо сделать, чтобы участвовать в социальной программе?"',
            'answer' => 'Чтобы участвовать в Социальной программе, Вам необходимо внести вступительный взнос. После 
            этого Вы можете выбрать одну из 8-ми программ для приобретения жилья и автомобиля.'
        ]);

        DB::table('faqs')->where('id', '=', 15)->update([
            'answer' => 'Срок рассрочки зависит от того что Вы собираетесь приобрести, самый максимальный срок рассрочки
             для жилья составляет 120 месяцев.'
        ]);

        DB::table('faqs')->where('id', '=', 16)->update([
            'answer' => 'Участник программы может получить жилье в период от 1-го до 12 месяцев. Срок получения 
            автомобиля от 1-го до 6 месяцев.'
        ]);

        DB::table('faqs')->where('id', '=', 17)->update([
            'answer' => 'Подробнее о программах можете во вкладке "Программы" или позвонить по номеру +7 707 369 17 77. 
            Также, можете посетить офис компании в г. Шымкент по адресу ул. Кабанбай батыра, 28Б.'
        ]);

    }
}
