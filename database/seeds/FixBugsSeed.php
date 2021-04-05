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
        {
            DB::table('user_packet')->where('user_id', '=', 100221)->update([
                'is_active' => false
            ]);

            DB::table('user_operation')->where('author_id', '=', 100221)->delete();

            $users = \App\Models\Users::whereIn('user_id',  [100124, 100052, 100048, 100047, 46, 11])->get();
            foreach($users as $user) {
                $user->group_sv_balance = $user->group_sv_balance - 2;
                $user->save();
            }
            $users1 = \App\Models\Users::whereIn('user_id',  [100124, 100103, 100088, 100052, 100048, 100047, 46, 11])->get();
            foreach($users1 as $user) {
                $user->gv_balance = $user->gv_balance - 100;
                $user->user_money = $user->user_money - 6;
                $user->save();
            }

            $user2 = \App\Models\Users::where('user_id', '=', '100124')->first();
            $user2->user_money = $user2->user_money - 42;
            $user2->save();

            $user3 = \App\Models\Users::where('user_id', '=', '9')->first();
            $user3->user_money = $user3->user_money - 6;
            $user3->save();
        }
    }
}
