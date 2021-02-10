<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'                 => 'required',
            'last_name'            => 'required',
            'password'             => 'required|min:5',
            'recommend_user_id'    => 'required',
            'inviter_user_id'      => 'required',
            'confirm_password'     => 'required|same:password',
            'email'                => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'login'                => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'phone'                => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'g-recaptcha-response' => 'required|captcha',
            'iin'                  => 'required|unique|integer|min:12|max:12'
        ];
    }
    public function messages()
    {
        return [
            'g-recaptcha.required' => 'Captcha is required',
        ];
    }
}
