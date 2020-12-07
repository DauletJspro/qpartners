<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangePacketPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->where(['packet_id' => \App\Models\Packet::CLASSIC])
            ->update([
                'packet_price' => 60,
            ]);
        DB::table('packet')->where(['packet_id' => \App\Models\Packet::PREMIUM])->update([
            'packet_price' => 120,
        ]);
        DB::table('packet')->where(['packet_id' => \App\Models\Packet::VIP2])->update([
            'packet_price' => 180,
        ]);
        DB::table('packet')->where(['packet_id' => \App\Models\Packet::GAP])->update([
            'packet_price' => 300,
        ]);
    }
}
