<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'email',
        'password',
        'login',
        'user_id'];

    const ADMIN = 1;
    const CLIENT = 2;
    const MODERATOR = 3;
    const Accountant = 100000;

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public static function parentFollowers($parent_id)
    {
        return Users::where(['recommend_user_id' => $parent_id])->get();
    }

    public static function isEnoughStatuses($parent_id, $status_id, $status_type)
    {
        $followerStatusIds = [];
        $followers = Users::where(['recommend_user_id' => $parent_id])->get();

        foreach ($followers as $follower) {
            if ($status_type == 1) {
                if ($follower->status_id >= $status_id) {
                    array_push($followerStatusIds, $follower->status_id);
                }
            } elseif ($status_type == 2) {
                if ($follower->soc_status_id >= $status_id) {
                    array_push($followerStatusIds, $follower->soc_status_id);
                }
            } elseif ($status_type == 3) {
                if ($follower->super_status_id >= $status_id) {
                    array_push($followerStatusIds, $follower->super_status_id);
                }
            }
        }
        $followerStatusIds = array_filter($followerStatusIds);
        if (count($followerStatusIds) >= 3) {
            return true;
        }
        return false;
    }

    public function packets()
    {
        return $this->hasMany(UserPacket::class, 'user_packet_id', 'user_id')->where('is_active', true);
    }

    public static function hasPackets(int $user_id)
    {
        $user_packet_count = UserPacket::where(['user_id' => $user_id])
            ->whereIn('packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::VIP2])->count();

        if ($user_packet_count) {
            return true;
        }
        return false;

    }
}
