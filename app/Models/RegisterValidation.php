<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterValidation extends Model
{
    public static function validateClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:5',
            'recommend_user_id' => 'required',
            'inviter_user_id' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'login' => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'iin' => 'required|unique:users,iin,NULL,user_id,deleted_at,NULL',
            'is_activated' => 'required'
        ], self::captchaArray());

        return $validator;
    }


    public static function validateEntrepreneur(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
            'organization_name' => 'required',
            'bin' => 'required|unique:users,iin,NULL,user_id,deleted_at,NULL',
            'agent_id' => 'required',
            'email' => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'login' => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'is_activated' => 'required'
        ], self::captchaArray());

        return $validator;
    }

    public static function validateConsumer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'login' => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'office_director_id' => 'required',
            'recommend_user_id' => 'required',
            'email' => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'is_activated' => 'required'
        ], self::captchaArray());

        return $validator;
    }

    public static function validateSeller(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'login' => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'city_id' => 'required',
            'email' => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'is_activated' => 'required'
        ], self::captchaArray());

        return $validator;
    }

    public static function validateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'login' => 'required|unique:users,login,NULL,user_id,deleted_at,NULL',
            'city_id' => 'required',
            'recommend_user_id' => 'required',
            'email' => 'required|email|unique:users,email,NULL,user_id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,user_id,deleted_at,NULL',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'is_activated' => 'required'
        ], self::captchaArray());

        return $validator;
    }

    public static function checkParentToChild(Request $request)
    {
        if (is_numeric($request->recommend_user_id)) {
            $recommend_user = Users::where('user_id', $request->recommend_user_id)->first();
            if ($recommend_user) {
                $recommend_user_count = Users::where('recommend_user_id', $request->recommend_user_id)->get();
                if (count($recommend_user_count) >= 3) {
                    return [
                        'success' => false,
                        'row' => (object)$request->all(),
                        'error' => 'Спонсор уже имеет более 3 участников 1 уровня',
                    ];
                }
            } else {
                return view('admin.new_design_auth.register', [
                    'success' => false,
                    'row' => (object)$request->all(),
                    'error' => 'Спонсор не найден!'
                ]);
            }
        }
        return [
            'success' => true,
        ];
    }

    public static function captchaArray()
    {
        return [
            'g-recaptcha-response.required' => 'Завершите captche (я не робот)',
            'iin.required' => 'Заполните ИИН'
        ];
    }
}