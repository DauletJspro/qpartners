<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepreneurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_id'                  => 'required',
            'full_description_ru'      => 'required|min:15',
            'street'                   => 'required',
            'office'                   => 'required',
            'house'                    => 'required',
            'image'                    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gap_card_sub_category_id' => 'required',
            'discount_percentage'      => 'required|integer|min:15|max:100'
        ];

    }
    public function messages()
    {
        return [
            'city_id.required'                      => 'Мы должны знать ваш город',
            'full_description_ru.required'          => 'Вам нужно заполнить полное описание',
            'full_description_ru.min'               => 'Минимальное количество букв для описание 15!!!',
            'street.required'                       => 'Мы должны знать вашу улицу',
            'office.required'                       => 'Мы должны знать ваш офис',
            'house.required'                        => 'Мы должны знать ваш дом',
            'image.required'                        => 'Нам нужно изображение компаний',
            'image.image'                           => 'Вы загрузили не изображение',
            'image.mimes'                           => 'Вы загрузили не верный формат изображение(jpeg,png,jpg,gif,svg 
            доступные 
            форматы для загрузки)',
            'image.max'                             => 'Максимальный обьем изображения 2мб',
            'gap_card_sub_category_id.required'     => 'Нам нужно чтобы вы выбрали раздел категорий',
            'discount_percentage.required'          => 'Нам нужно чтобы ваша скидка',
            'discount_percentage.integer'           => 'Поля для скидки может содержать только цифры',
            'discount_percentage.min'               => 'Минимальное значение для скидки ровно 15%',
            'discount_percentage.max'               => 'Максимальное значение для скидки ровно 100%'
        ];
    }
}
