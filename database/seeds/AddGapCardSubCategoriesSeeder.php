<?php

use Illuminate\Database\Seeder;

class AddGapCardSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gap_card_sub_categories')->insert([
            [
                'title_kz' => 'Квесты',
                'title_ru' => 'Квесты',
                'gap_card_category_id' => 1,
            ],
            [
                'title_kz' => 'Парки развлечений',
                'title_ru' => 'Парки развлечений',
                'gap_card_category_id' => 1,
            ],
            [
                'title_kz' => 'Активный отдых',
                'title_ru' => 'Активный отдых',
                'gap_card_category_id' => 1,
            ],
            [
                'title_kz' => 'Рестораны',
                'title_ru' => 'Рестораны',
                'gap_card_category_id' => 2,
            ],
            [
                'title_kz' => 'Кафе',
                'title_ru' => 'Кафе',
                'gap_card_category_id' => 2,
            ],
            [
                'title_kz' => 'Бары',
                'title_ru' => 'Бары',
                'gap_card_category_id' => 2,
            ],
            [
                'title_kz' => 'Быстрое питание',
                'title_ru' => 'Быстрое питание',
                'gap_card_category_id' => 2,
            ],
            [
                'title_kz' => 'Доставка еды',
                'title_ru' => 'Доставка еды',
                'gap_card_category_id' => 2,
            ],
            [
                'title_kz' => 'Медицинские центры',
                'title_ru' => 'Медицинские центры',
                'gap_card_category_id' => 3,
            ],
            [
                'title_kz' => 'Обследование',
                'title_ru' => 'Обследование',
                'gap_card_category_id' => 3,
            ],
            [
                'title_kz' => 'Стоматология',
                'title_ru' => 'Стоматология',
                'gap_card_category_id' => 3,
            ],
            [
                'title_kz' => 'Анализы',
                'title_ru' => 'Анализы',
                'gap_card_category_id' => 3,
            ],
            [
                'title_kz' => 'Прием к врачу',
                'title_ru' => 'Прием к врачу',
                'gap_card_category_id' => 3,
            ],
            [
                'title_kz' => 'Барбершоп',
                'title_ru' => 'Барбершоп',
                'gap_card_category_id' =>4 ,
            ],
            [
                'title_kz' => 'Салон красоты',
                'title_ru' => 'Салон красоты',
                'gap_card_category_id' => 4,
            ],
            [
                'title_kz' => 'Косметология',
                'title_ru' => 'Косметология',
                'gap_card_category_id' => 4,
            ],
            [
                'title_kz' => 'Уход за ногтями',
                'title_ru' => 'Уход за ногтями',
                'gap_card_category_id' => 4,
            ],
            [
                'title_kz' => 'Массаж',
                'title_ru' => 'Массаж',
                'gap_card_category_id' => 4,
            ],
            [
                'title_kz' => 'Фитнес центры',
                'title_ru' => 'Фитнес центры',
                'gap_card_category_id' => 5,
            ],
            [
                'title_kz' => 'Прокат и аренда',
                'title_ru' => 'Прокат и аренда',
                'gap_card_category_id' => 5,
            ],
            [
                'title_kz' => 'Бассейны',
                'title_ru' => 'Бассейны',
                'gap_card_category_id' => 5,
            ],
            [
                'title_kz' => 'Кардио тренировки',
                'title_ru' => 'Кардио тренировки',
                'gap_card_category_id' => 5,
            ],
            [
                'title_kz' => 'Спорт для детей ',
                'title_ru' => 'Спорт для детей ',
                'gap_card_category_id' => 5,
            ],
            [
                'title_kz' => 'Санатории',
                'title_ru' => 'Санатории',
                'gap_card_category_id' => 6,
            ],
            [
                'title_kz' => 'Зоны отдыха',
                'title_ru' => 'Зоны отдыха',
                'gap_card_category_id' => 6,
            ],
            [
                'title_kz' => 'Туры выходного дня',
                'title_ru' => 'Туры выходного дня',
                'gap_card_category_id' => 6,
            ],
            [
                'title_kz' => 'Активный туризм',
                'title_ru' => 'Активный туризм',
                'gap_card_category_id' => 6,
            ],
            [
                'title_kz' => 'Духовный туризм',
                'title_ru' => 'Духовный туризм',
                'gap_card_category_id' => 6,
            ],
            [
                'title_kz' => 'Мастер-классы',
                'title_ru' => 'Мастер-классы',
                'gap_card_category_id' => 7,
            ],
            [
                'title_kz' => 'Онлайн услуги',
                'title_ru' => 'Онлайн услуги',
                'gap_card_category_id' => 7,
            ],
            [
                'title_kz' => 'Фото и видео услуги',
                'title_ru' => 'Фото и видео услуги',
                'gap_card_category_id' => 7,
            ],
            [
                'title_kz' => 'Образовательные услуги',
                'title_ru' => 'Образовательные услуги',
                'gap_card_category_id' => 7,
            ],
            [
                'title_kz' => 'Технические услуги',
                'title_ru' => 'Технические услуги',
                'gap_card_category_id' => 7,
            ],
            [
                'title_kz' => 'Товары для дома',
                'title_ru' => 'Товары для дома',
                'gap_card_category_id' => 8,
            ],
            [
                'title_kz' => 'Товары для здоровья',
                'title_ru' => 'Товары для здоровья',
                'gap_card_category_id' => 8,
            ],
            [
                'title_kz' => 'Одежда и аксессуары',
                'title_ru' => 'Одежда и аксессуары',
                'gap_card_category_id' => 8,
            ],
            [
                'title_kz' => 'Товары по уходу за кожей',
                'title_ru' => 'Товары по уходу за кожей',
                'gap_card_category_id' => 8,
            ],
            [
                'title_kz' => 'Продовольственные товары',
                'title_ru' => 'Продовольственные товары',
                'gap_card_category_id' => 8,
            ],
        ]);
    }
}
