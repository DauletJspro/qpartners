<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterRequest;
use App\Models\PasswordReset;
use App\Models\Position;
use App\Models\UserInfo;
use App\Models\Users;
use App\ResetPasswor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SuperClosure\Analyzer\Token;
use View;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function __construct()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
        // $country_row = Country::orderBy('sort_num','asc')
        //             ->orderBy('country_name_ru','asc')
        //             ->where('is_show',1)
        //             ->get();

        $users_row = Users::orderBy('last_name', 'asc')
            ->get();

        // $city_row = City::orderBy('city_name_ru','asc')
        //             ->where('is_show',1)
        //             ->where('country_id',1)
        //             ->get();

        $speaker_row = Users::orderBy('last_name', 'asc')->where('is_speaker', 1)->get();
        $director_row = Users::orderBy('last_name', 'asc')->where('is_director_office', 1)->get();
        $activate = Position::all()->pluck('name', 'id_select')->toArray();
        // View::share('country_row', $country_row);
        View::share('recommend_row', $users_row);
        View::share('activate', $activate);
        // View::share('city_row', $city_row);
        View::share('speaker_row', $speaker_row);
        View::share('office_row', $director_row);
    }

    public function login(Request $request)
    {
        if (isset($request->login)) {
            $userdata = array(
                'email' => $request->login,
                'password' => $request->password
            );

            if (!Auth::attempt($userdata)) {
                $userdata = array(
                    'login' => $request->login,
                    'password' => $request->password
                );

                if (!Auth::attempt($userdata)) {
                    $userdata = array(
                        'user_id' => $request->login,
                        'password' => $request->password
                    );

                    if (!Auth::attempt($userdata)) {
                        $error = 'Неправильный логин или пароль';
                        return view('admin.new_design_auth.login', [
                            'login' => $request->login,
                            'error' => $error
                        ]);
                    }
                }
            }
        }

        if (Auth::check()) {
            if (Auth::user()->is_ban == 1) {
                $error = 'Вас заблокировали';
                Auth::logout();
                return view('admin.new_design_auth.login', [
                    'login' => $request->login,
                    'error' => $error
                ]);
            }

            if (Auth::user()->is_activated)
                return redirect('/admin/index');
            else {
                return redirect('/admin/shop');
            }

        }

        return view('admin.new_design_auth.login', ['login' => '']);
    }

    public function showRegister(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->is_ban == 1) {
                $error = 'Вас заблокировали';
                Auth::logout();
                return view('admin.auth.login', [
                    'login' => $request->login,
                    'error' => $error
                ]);
            }
            return redirect('/admin/index');
        }

        $user = new Users();


        return view('admin.new_design_auth.register', [
            'row' => $user,
        ]);
    }

    public function register(Request $request)
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
        ], [
            'g-recaptcha-response.required' => 'Завершите captche (я не робот)',
            'iin.required' => 'Заполните ИИН'
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return view('admin.new_design_auth.register', [
                'title' => '',
                'row' => (object)$request->all(),
                'error' => $error[0],
            ]);
        }

        $user = new Users();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->city_id = $request->city_id;
        $user->password = Hash::make($request->password);
//        $user->password_original = $request->password;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->iin = $request->iin;
        $user->is_activated = $request->is_activated;
        $user->phone = $request->phone;

        $request->instagram = str_replace('http://www.instagram.com/', '', $request->instagram);
        $request->instagram = str_replace('https://www.instagram.com/', '', $request->instagram);
        $request->instagram = str_replace('https://instagram.com/', '', $request->instagram);
        $request->instagram = str_replace('http://instagram.com/', '', $request->instagram);

        $user->instagram = $request->instagram;

        $user->role_id = 2;
        $user->is_confirm_email = 0;
        $user->recommend_user_id = is_numeric($request->recommend_user_id) ? $request->recommend_user_id : null;
        $user->inviter_user_id = is_numeric($request->inviter_user_id) ? $request->inviter_user_id : null;
        $user->speaker_id = is_numeric($request->speaker_id) ? $request->speaker_id : null;
        $user->office_director_id = is_numeric($request->office_director_id) ? $request->office_director_id : null;
        if (is_numeric($request->recommend_user_id)) {
            $recommend_user = Users::where('user_id', $request->recommend_user_id)->first();
            if ($recommend_user) {
                $recommend_user_count = Users::where('recommend_user_id', $request->recommend_user_id)->get();
                if (count($recommend_user_count) >= 3) {
                    return view('admin.new_design_auth.register', [
                        'title' => '',
                        'row' => (object)$request->all(),
                        'error' => 'Спонсор уже имеет более 3 участников 1 уровня'
                    ]);
                }
            } else {
                return view('admin.new_design_auth.register', [
                    'title' => '',
                    'row' => (object)$request->all(),
                    'error' => 'Спонсор уже имеет более 3 участников 1 уровня'
                ]);
            }
        }
        $hash_email = md5(uniqid(time(), true));
        $user->hash_email = $hash_email;
        $user->activated_date = date("Y-m-d");
        $user->save();

        $recommend_user = Users::where('user_id', $request->recommend_user_id)->first();
        $is_left_config = is_numeric($request->is_left_config) ? $request->is_left_config : $recommend_user->is_left_config;

        $user->recommend_user_id = $recommend_user->user_id;
        $user->is_left_part = $is_left_config;

        $check = false;
        $parent_user = $recommend_user;

        while ($check != true) {
            $parent_check = Users::where('parent_id', $parent_user->user_id)->where('is_left_part', $is_left_config)->first();
            if ($parent_check == null) {
                $check = true;
                $user->parent_id = $parent_user->user_id;
            } else {
                $parent_user = $parent_check;
            }
        }

        if ($user->parent_id == $user->recommend_user_id && $user->parent_id != 1) {
            $child_user_count = Users::where('parent_id', $user->parent_id)->count();
            if ($child_user_count == 0) {
                $parent_user = Users::where('user_id', $user->parent_id)->first();
                if ($parent_user->is_left_part != $user->is_left_part)
                    $user->is_left_part = $parent_user->is_left_part;
            }
        }

        $user->save();

        $user_info = new UserInfo();
        $user_info->user_id = $user->user_id;
        $user_info->iin = $request->iin;
        $user_info->address = $request->address;

        $user_info->save();

        $email = $request->email;

        $ok = \App\Http\Helpers::send_mime_mail('info@qazaqturizm.org',
            'info@qpartners.com',
            $email,
            $email,
            'windows-1251',
            'UTF-8',
            'Подтверждение электронной почты',
            view('mail.confirm-email', ['hash' => $hash_email, 'email' => $request->email]),
            true);

        $success = 'Поздравляю, Вы успешно зарегистрировались!';

        return view('admin.new_design_auth.login', [
            'success' => $success,
            'ok' => $ok
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showResetPassword(Request $request)
    {
        return view('admin.new_design_auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make(['email' => $request->email], [
            'email' => 'required|exists:users,email',
        ]);

        if ($validator->fails()) {
            $error = 'Пользователь с такой почтой не найден';
            return view('admin.auth.reset-password', [
                'email' => $request->email,
                'error' => $error
            ]);
        }

        try {
            $email = $request->email;

//            $user = Users::where('email', '=', $request->email)->first();
            $token = Str::random(60);

            $resetPassword = new PasswordReset();
            $resetPassword->email = $email;
            $resetPassword->token = $token;
            $resetPassword->is_active = true;
            $resetPassword->save();
            $link = sprintf('%s?email=%s&token=%', $_SERVER['SERVER_NAME'] . '/' . route('show.password'), $email, $token);


            $ok = \App\Http\Helpers::send_mime_mail('Qpartners.club',
                'info@roiclub.kz',
                $email,
                $email,
                'windows-1251',
                'UTF-8',
                'Восстановление пароля',
                view('mail.reset-password', [
                    'email' => $email,
                    'link' => $link,
                ]),
                true);


        } catch (Exception $ex) {
            $result['error'] = 'Ошибка базы данных';
            $result['error_code'] = 500;
            $result['status'] = false;
            return response()->json($result);
        }

        $error = 'На почту отправлен новый пароль';
        return view('admin.auth.login', [
            'error' => $error
        ]);
    }


    public function showSetPassword(Request $request)
    {
        $token = $request->input('token');
        $user = Users::where('email', '=', $request->input('email'));
        $resetPassword = PasswordReset::where('token', '=', $token);
        if ($resetPassword->is_active == false) {
            return redirect()->route('reset.password')->with('error', 'Ссылка не активная, повторите отправку!!!');
        }
        $resetPassword->is_active = false;
        $resetPassword->save();
        return view('admin.new_design_auth.new_password', compact('user'));
    }

    public function setNewPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $error = 'Произошла ошибка при восстановлении пароля, пожалуйста попробуйте еще раз!';
            return view('admin.new_design_auth.new_password', [
                'email' => $request->email,
                'error' => $error
            ]);
        }
        $user = Users::where('email', '=', $request->email)->first();
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect()->route('login.show')->with('success', 'Вы успешно восстановили пароль!!!');
        }
    }


    public function showSendConfirm(Request $request)
    {
        return view('admin.auth.send-confirm');
    }

    public function confirmEmail(Request $request)
    {
        $user = Users::where('email', $request->email)->where('hash_email', $request->hash)->first();

        if ($user == null) {
            return view('admin.auth.login', [
                'error' => 'Неправильная электронная почта или hash'
            ]);
        } else if ($user->is_confirm_email == 1) {
            return view('admin.auth.login', [
                'error' => 'Вы уже подтвердили'
            ]);
        }

        $user->is_confirm_email = 1;
        $user->save();

        return view('admin.auth.login', [
            'error' => 'Вы успешно подтвердили'
        ]);
    }

    public function sendHashConfirm(Request $request)
    {
        $user = Users::where('email', $request->email)->first();

        if ($user == null) {
            return view('admin.auth.send-confirm', [
                'error' => 'Неправильная электронная почта'
            ]);
        } else if ($user->is_confirm_email == 1) {
            return view('admin.auth.login', [
                'error' => 'Вы уже подтвердили'
            ]);
        }

        $hash_email = md5(uniqid(time(), true));
        $user->hash_email = $hash_email;

        $user->save();

        $email = $request->email;

        $ok = \App\Http\Helpers::send_mime_mail('info@qpartners.com',
            'info@qpartners.com',
            $email,
            $email,
            'windows-1251',
            'UTF-8',
            'Подтверждение электронной почты',
            view('mail.confirm-email', ['hash' => $hash_email, 'email' => $request->email]),
            true);

        $error = 'На ваш почтовый ящик было отправлено письмо с просьбой подтвердить электронную почту';
        return view('admin.auth.login', [
            'error' => $error,
            'ok' => $ok
        ]);
    }
}
