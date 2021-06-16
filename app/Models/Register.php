<?php


namespace App\Models;


use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Register extends Model
{
    public static function register(Request $request)
    {

        $user = new Users();

        $user->fill($request->all());
        
        $user->password = Hash::make($request->password);
        $instagram = self::handleInstagram($request);
        $user->instagram = $instagram;
        $user->is_confirm_email = false;
        $hash_email = md5(uniqid(time(), true));
        $user->hash_email = $hash_email;
        $user->activated_date = date("Y-m-d H:i:s");


        if ($request->role_id == Role::ENTREPRENEUR) {
            $user->bin = $request->bin;
            $user->brand_name = $request->brand_name;
            $user->organization_name = $request->organization_name;
        }

        $user->save();

        self::setParentId($request, $user);

        self::setUserInfo($request, $user);

        self::sendNotificationToEmail($request, $hash_email);
    }

    public static function handleInstagram(Request $request)
    {
        $instagram = str_replace('http://www.instagram.com/', '', $request->instagram);
        $instagram = str_replace('https://www.instagram.com/', '', $request->instagram);
        $instagram = str_replace('https://instagram.com/', '', $request->instagram);
        $instagram = str_replace('http://instagram.com/', '', $request->instagram);

        return $instagram;
    }

    public static function setParentId(Request $request, Users $user)
    {
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
    }

    public static function setUserInfo(Request $request, Users $user)
    {
        $user_info = new UserInfo();
        $user_info->user_id = $user->user_id;
        $user_info->iin = $request->iin;
        $user_info->address = $request->address;

        $user_info->save();
    }

    public static function sendNotificationToEmail(Request $request, $hash_email)
    {
        $email = $request->email;

        \App\Http\Helpers::send_mime_mail('info@qazaqturizm.org',
            'info@qpartners.com',
            $email,
            $email,
            'windows-1251',
            'UTF-8',
            'Подтверждение электронной почты',
            view('mail.confirm-email', ['hash' => $hash_email, 'email' => $request->email]),
            true);
    }
}