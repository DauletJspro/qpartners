<?php

use Illuminate\Database\Seeder;

class AddGapCardCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('gap_card_categories')->insert([
            [
                'title_kz' => 'РАЗВЛЕЧЕНИЯ',
                'title_ru' => 'РАЗВЛЕЧЕНИЯ',
            ],
            [
                'title_kz' => 'ЕДА',
                'title_ru' => 'ЕДА',
            ],
            [
                'title_kz' => 'ЗДОРОВЬЕ',
                'title_ru' => 'ЗДОРОВЬЕ',
            ],
            [
                'title_kz' => 'КРАСОТА',
                'title_ru' => 'КРАСОТА',
            ],
            [
                'title_kz' => 'СПОРТ',
                'title_ru' => 'СПОРТ',
            ],
            [
                'title_kz' => 'ТУРИЗМ',
                'title_ru' => 'ТУРИЗМ',
            ],
            [
                'title_kz' => 'УСЛУГИ',
                'title_ru' => 'УСЛУГИ',
            ],
            [
                'title_kz' => 'ТОВАРЫ',
                'title_ru' => 'ТОВАРЫ',
            ],
        ]);
    }
}
