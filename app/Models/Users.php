<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $primaryKey = 'user_id';
    protected $fillable = ['email', 'password', 'login', 'user_id'];

    const ADMIN = 1;
    const CLIENT = 2;
    const MODERATOR = 3;

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public static function parentFollowers($parent_id)
    {
        return Users::where(['recommend_user_id' => $parent_id])->get();
    }

    public static function isEnoughStatuses($parent_id, $status_id)
    {
        $followers = Users::where(['recommend_user_id' => $parent_id])->get();
        $followerStatusIds = array_map(function ($user) use ($status_id) {
            if ($user['status_id'] >= $status_id) {
                return $user['status_id'];
            }
        }, $followers->toArray());
//        $followerStatusIds = array_filter($followerStatusIds);
        if (count($followerStatusIds) >= 5) {
            return true;
        }
        return false;
    }
}
