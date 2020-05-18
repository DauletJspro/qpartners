<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Illuminate\Support\Arr;

class UserPacket extends Model
{


    protected $table = 'user_packet';
    protected $primaryKey = 'user_packet_id';

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function packet()
    {
        return $this->belongsTo('App\Models\Packet');
    }

    public static function beforePurchaseSum($user_id)
    {
        $userPackets = UserPacket::where(['user_packet.user_id' => $user_id])->where('user_packet.is_active', 1)
            ->join('packet', 'packet.packet_id', '=', 'user_packet.packet_id')->get()->sortByDesc('packet.packet_id');


        if (!count($userPackets)) {
            return 0;
        };

        $userPackets = collect($userPackets);
        $userPackets = Arr::pluck($userPackets, 'packet.packet_price', 'packet.packet_id');
        $minValue = (min(array_keys($userPackets)));
        $sum = [];
        foreach ($userPackets as $key => $value) {
            $temporary = [];
            if ($key > $minValue) {
                for ($i = $key; $i >= $minValue; $i--) {
                    $max = $userPackets[$key];
                    $num = (isset($userPackets[$i]) ? $userPackets[$i] : 0);
                    array_push($temporary, $num);
                }
                $sumV = $temporary[0];
                foreach ($temporary as $key => $item) {
                    if ($key != 0) {
                        $sumV = $sumV - $temporary[$key];
                    }
                }
                array_push($sum, $sumV);
            } else {
                array_push($sum, $value);
            }
        }
        return intval(array_sum($sum));

    }

}