<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Order extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['order_code', 'user_id', 'username', 'email', 'address', 'contact', 'sum', 'products', 'packet_id', 'is_paid', 'payment_id'];

    public static function createOrder($data) {
        $order = Order::create([
            'order_code' => $data['order_code'],
            'user_id' => $data['user_id'],
            'username' => $data['username'],
            'email' => $data['email'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'sum' => $data['sum'],
            'products' => $data['products'],
            'packet_id' => $data['packet_id'],
            'is_paid' => 0,
            'payment_id' => $data['payment_id']            
        ]);

        return $order;
    }

    public static function changeIsPaid($order_code) {
        return Order::where('order_code', $order_code)->update(['is_paid' => 1]);
    }

    public static function getByCode($order_code) {
        return Order::where('order_code', $order_code)->first();
    }

}
