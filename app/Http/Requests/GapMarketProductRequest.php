<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class GapMarketProductRequest extends FormRequest
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
        $rules = [
            'product_name_ru' => 'required|min:1|max:255',
            'sub_category_id' => 'required',
            'product_price' => 'required|numeric',
            'product_desc_ru' => 'required|min:3',
            'full_description_ru' =>'required|min:3'

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'product_name_ru.min' => 'Поле название должно содержать не менее :min символов',
            'product_name_ru.required' => 'Поле название является обязательным!',
            'sub_category_id.required' => 'Поле под-категория является обязательным!',
            'product_desc_ru.min' => 'Поле описание должно содержать не менее :min символов',
            'product_desc_ru.required' => 'Поле описание является обязательным!',
            'product_price.required' => 'Поле цена является обязательным!',
            'product_price.numeric' => 'В этой поле вы не можете использовать буквы',
            'full_description_ru.min' => 'Поле описание должно содержать не менее :min символов',
            'full_description_ru.required' => 'Поле описание является обязательным!',
        ];
    }
}
