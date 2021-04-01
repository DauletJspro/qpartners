<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixBugsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_packet')->where('user_id', '100165')->whereIn('packet_id', [27,33])->update([
            'is_active' => false
        ]);
    }
}
