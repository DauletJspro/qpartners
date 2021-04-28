<?php

use Illuminate\Database\Seeder;

class AddCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'ДЛЯ ЗДОРОВЬЯ',
                'description' => 'ДЛЯ ЗДОРОВЬЯ',
                'is_show' => 0,
            ],
            [
                'name' => 'ПРОДУКТЫ ПИТАНИЯ',
                'description' => 'ПРОДУКТЫ ПИТАНИЯ',
                'is_show' => 0,

            ],
            [
                'name' => 'КОСМЕТИКА',
                'description' => 'Описание КОСМЕТИКА',
                'is_show' => 0,
            ],
            [
                'name' => 'ПАРФЮМЕРИЯ',
                'description' => 'Описание ПАРФЮМЕРИЯ',
                'is_show' => 0,
            ],
            [
                'name' => 'ОДЕЖДА, ОБУВЬ',
                'description' => 'Описание ОДЕЖДА, ОБУВЬ',
                'is_show' => 0,
            ],
            [
                'name' => 'ВСЕ ДЛЯ ДОМА',
                'description' => 'Описание ВСЕ ДЛЯ ДОМА',
                'is_show' => 0,
            ],
            [
                'name' => 'ЭЛЕКТРОНИКА',
                'description' => 'Описание ЭЛЕКТРОНИКА',
                'is_show' => 0,
            ],
            [
                'name' => 'СТРОЙМАТЕРИАЛЫ',
                'description' => 'Описание СТРОЙМАТЕРИАЛЫ',
                'is_show' => 0,
            ],
            [
                'name' => 'АВТОЗАПЧАСТИ',
                'description' => 'Описание АВТОЗАПЧАСТИ',
                'is_show' => 0,
            ],
        ]);
    }
}
