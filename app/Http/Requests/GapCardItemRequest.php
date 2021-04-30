<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GapCardItemRequest extends FormRequest
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
        $rules =  [
            'title_kz' => 'required|min:3',
            'title_ru' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_percentage' => 'required',
            'price' => 'required',
            'gap_card_sub_category_id' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute',
            'min:5' => 'Минимальное количество символов должно быть 5'
        ];
    }
}
