<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\PasswordReset;
use App\Models\Position;
use App\Models\Register;
use App\Models\RegisterValidation;
use App\Models\Role;
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

        $users_row = Users::orderBy('last_name', 'asc')
            ->get();

        $speaker_row = Users::orderBy('last_name', 'asc')->where('is_speaker', 1)->get();
        $director_row = Users::orderBy('last_name', 'asc')->where('is_director_office', 1)->get();
        $activate = Position::all()->pluck('name', 'id_select')->toArray();
        $cities = City::where(['country_id' => Country::Kazakhstan])->get();
        $agents = Users::where(['is_activated' => true])->get();
        View::share('agents', $agents);
        View::share('recommend_row', $users_row);
        View::share('activate', $activate);
        View::share('speaker_row', $speaker_row);
        View::share('office_row', $director_row);
        View::share('cities', $cities);
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
            if(Auth::user()->role_id == Role::CONSUMER){
                return redirect('/admin/gap_card/orders');
            }

            if (Auth::user()->is_activated && Auth::user()->role_id != Role::CONSUMER)
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
                    'error' => $error,
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
        
        switch ($request->role_id) {
            case Role::CLIENT:
                $validator = RegisterValidation::validateClient($request);
                break;
            case Role::ENTREPRENEUR:
                $validator = RegisterValidation::validateEntrepreneur($request);
                break;
            case Role::CONSUMER:
                $validator = RegisterValidation::validateConsumer($request);
                break;
            case Role::SELLER:
                $validator = RegisterValidation::validateSeller($request);
                break;
            case Role::USER:
                $validator = RegisterValidation::validateUser($request);
                break;
        }

        $checkParentToChild = RegisterValidation::checkParentToChild($request);

        if (!$checkParentToChild['success']) {
            return view('admin.new_design_auth.register', [
                'row' => (object)$request->all(),
                'error' => 'Спонсор уже имеет более 3 участников 1 уровня',
                'role_id' => $request->role_id,
                'is_activated' => $request->is_activated,
            ]);
        }


        if ($validator->fails()) {
            return view('admin.new_design_auth.register', [
                'row' => (object)$request->all(),
                'error' => $validator->errors()->all()[0],
                'role_id' => $request->role_id,
                'is_activated' => $request->is_activated,
            ]);
        }

        try {
            DB::beginTransaction();
            Register::register($request);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            $error = 'Произошла системная ошибка: ' . $exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage();

            return view('admin.new_design_auth.register', [
                'row' => (object)$request->all(),
                'error' => $error,
                'role_id' => $request->role_id,
                'is_activated' => $request->is_activated,
            ]);
        }

        if($request->role_id == Role::CONSUMER){
            return $this->login($request);
        }
        return view('admin.new_design_auth.login', [
            'success' => 'Поздравляю, Вы успешно зарегистрировались!',
            'ok' => true
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

    public function showCheckListRegister()
    {
        return view('admin.new_design_auth.check-list-register');

    }
}
