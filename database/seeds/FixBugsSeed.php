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
        DB::table('user_packet')->where('user_id', '=', 100218)->where('packet_id', 23)->update([
            'is_active' => false
        ]);

        DB::table('user_operation')->where('author_id', '=', 100218)->delete();

        $user = \App\Models\Users::where('user_id', '=', '50')->first();
            $user->user_money = $user->user_money - 96;
            $user->save();

        $user2 = \App\Models\Users::where('user_id', '=', '9')->first();
        $user2->user_money = $user2->user_money - 9;
        $user2->save();
    }
}
