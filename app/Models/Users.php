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
        'user_id',
        'group_id',
        'iin',
        'home_group_id',
        'group_plus_id',
        'home_plus_id',
        'is_active',
        'qoldau_id',
        'qamqor_id',
        'jastar_id',
        'jas_otau_id',
        'personal_sv_balance'
        ];

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
    public static function hasCountPackets(int $user_id)
    {
        $user_packet_count = UserPacket::where(['user_id' => $user_id])
            ->where('is_active', '=', true)
            ->count();

        if ($user_packet_count) {
            return true;
        }
        return false;

    }

    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class);
    }

    /**
     * A user can have many comments
     */
    public function comments()
    {
        return $this->hasMany(\App\Models\CommentTicket::class);
    }

    public function program(){
        return $this->hasMany(CooperativeGroup::class,'id','group_id');
    }

    public function programHome(){
        return $this->hasMany(CooperativeGroup::class,'id','home_group_id');
    }

    public function getPosition(){
        return $this->hasMany(Position::class, 'id_select' , 'is_activated');
    }
    /**
     * Get the user that created ticket
     * @param \App\User $user_id
     */
    public static function getTicketOwner($user_id)
    {
        return static::where('id', $user_id)->firstOrFail();
    }

    public static function getSponsorName($id){
        $sponsor = Users::where('user_id', '=', $id->recommend_user_id)->first();
        return $sponsor->login;
    }
}
