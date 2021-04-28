<?php

use Illuminate\Database\Seeder;

class AddSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            [
                'title_kz' => 'Эликсирлер',
                'title_ru' => 'Эликсиры',
                'category_id' => 8,
            ],
            [
                'title_kz' => 'Крема',
                'title_ru' => 'Крема',
                'category_id' => 8,

            ],
            [
                'title_kz' => 'Спреи',
                'title_ru' => 'Спреи',
                'category_id' => 8,
            ],
            [
                'title_kz' => 'Гели',
                'title_ru' => 'Гели',
                'category_id' => 8,
            ],
            [
                'title_kz' => 'Детокс',
                'title_ru' => 'Детокс',
                'category_id' => 8,
            ],
            [
                'title_kz' => 'Жеміс-көкөніс тауарлары',
                'title_ru' => 'Плодо – овощные товары',
                'category_id' => 9,
            ],
            [
                'title_kz' => 'Зерно-мучные товары',
                'title_ru' => 'Зерно-мучные товары',
                'category_id' => 9,
            ],
            [
                'title_kz' => 'Ет өнімдері',
                'title_ru' => 'Мясная продукция',
                'category_id' => 9,
            ],
            [
                'title_kz' => 'Сүт өнімдері',
                'title_ru' => 'Молочная продукция',
                'category_id' => 9,
            ],
            [
                'title_kz' => 'Кондитерлік өнімдер',
                'title_ru' => 'Кондитерская продукция',
                'category_id' => 9,
            ],
            [
                'title_kz' => 'Тазартатын косметика',
                'title_ru' => 'Очищающая косметика',
                'category_id' => 10,
            ],
            [
                'title_kz' => 'Тонизирующая косметика',
                'title_ru' => 'Тонизирующая косметика',
                'category_id' => 10,
            ],
            [
                'title_kz' => 'Увлажняющая косметика',
                'title_ru' => 'Увлажняющая косметика',
                'category_id' => 10,
            ],
            [
                'title_kz' => 'Питательная косметика',
                'title_ru' => 'Питательная косметика',
                'category_id' => 10,
            ],
            [
                'title_kz' => 'Защитная косметика',
                'title_ru' => 'Защитная косметика',
                'category_id' => 10,
            ],
            [
                'title_kz' => 'Духи',
                'title_ru' => 'Духи',
                'category_id' => 11,
            ],
            [
                'title_kz' => 'Туалетная вода',
                'title_ru' => 'Туалетная вода',
                'category_id' => 11,
            ],
            [
                'title_kz' => 'Парфюмерная вода',
                'title_ru' => 'Парфюмерная вода',
                'category_id' => 11,
            ],
            [
                'title_kz' => 'Одеколоны',
                'title_ru' => 'Одеколоны',
                'category_id' => 11,
            ],
            [
                'title_kz' => 'Душистая вода',
                'title_ru' => 'Душистая вода',
                'category_id' => 11,
            ],
            [
                'title_kz' => 'Мужская одежда ',
                'title_ru' => 'Мужская одежда ',
                'category_id' => 12,
            ],
            [
                'title_kz' => 'Женская одежда',
                'title_ru' => 'Женская одежда',
                'category_id' => 12,
            ],
            [
                'title_kz' => 'Детская одежда',
                'title_ru' => 'Детская одежда',
                'category_id' => 12,
            ],
            [
                'title_kz' => 'Летняя обувь',
                'title_ru' => 'Летняя обувь',
                'category_id' => 12,
            ],
            [
                'title_kz' => 'Зимняя обувь',
                'title_ru' => 'Зимняя обувь',
                'category_id' => 12,
            ],
            [
                'title_kz' => 'Уборка и чистка',
                'title_ru' => 'Уборка и чистка',
                'category_id' => 13,
            ],
            [
                'title_kz' => 'Бытовая техника',
                'title_ru' => 'Бытовая техника',
                'category_id' => 13,
            ],
            [
                'title_kz' => 'Мебель для дома',
                'title_ru' => 'Мебель для дома',
                'category_id' => 13,
            ],
            [
                'title_kz' => 'Аксессуары и органайзеры',
                'title_ru' => 'Аксессуары и органайзеры',
                'category_id' => 13,
            ],
            [
                'title_kz' => 'Разное',
                'title_ru' => 'Разное',
                'category_id' => 13,
            ],
            [
                'title_kz' => 'Смартфоны',
                'title_ru' => 'Смартфоны',
                'category_id' => 14,
            ],
            [
                'title_kz' => 'Компьютеры',
                'title_ru' => 'Компьютеры',
                'category_id' => 14,
            ],
            [
                'title_kz' => 'Гаджеты',
                'title_ru' => 'Гаджеты',
                'category_id' => 14,
            ],
            [
                'title_kz' => 'Радиоэлектроника',
                'title_ru' => 'Радиоэлектроника',
                'category_id' => 14,
            ],
            [
                'title_kz' => 'Аксессуары',
                'title_ru' => 'Аксессуары',
                'category_id' => 14,
            ],
            [
                'title_kz' => 'Строительные смеси',
                'title_ru' => 'Строительные смеси',
                'category_id' => 15,
            ],
            [
                'title_kz' => 'Строительная химия',
                'title_ru' => 'Строительная химия',
                'category_id' => 15,
            ],
            [
                'title_kz' => 'Твердые строительные материалы',
                'title_ru' => 'Твердые строительные материалы',
                'category_id' => 15,
            ],
            [
                'title_kz' => 'Жидкие строительные материалы',
                'title_ru' => 'Жидкие строительные материалы',
                'category_id' => 15,
            ],
            [
                'title_kz' => 'Хозтовары',
                'title_ru' => 'Хозтовары',
                'category_id' => 15,
            ],
            [
                'title_kz' => 'Авто электроника',
                'title_ru' => 'Авто электроника',
                'category_id' => 16,
            ],
            [
                'title_kz' => 'Авто аксессуары ',
                'title_ru' => 'Авто аксессуары ',
                'category_id' => 16,
            ],
            [
                'title_kz' => 'Автомобильное оборудование',
                'title_ru' => 'Автомобильное оборудование',
                'category_id' => 16,
            ],
            [
                'title_kz' => 'Запчасти для грузовой техники',
                'title_ru' => 'Запчасти для грузовой техники',
                'category_id' => 16,
            ],
            [
                'title_kz' => 'Запчасти для легковой техники',
                'title_ru' => 'Запчасти для легковой техники',
                'category_id' => 16,
            ],
        ]);
    }
}
