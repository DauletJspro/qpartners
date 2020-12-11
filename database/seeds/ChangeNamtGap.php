<?php

use Illuminate\Database\Seeder;

class ChangeNamtGap extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->where(['packet_id' => \App\Models\Packet::GAP3])->update([
            'packet_name_ru' => 'Gap 3',
        ]);
            }
}
