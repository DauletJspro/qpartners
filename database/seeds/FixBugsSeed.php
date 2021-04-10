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
            DB::table('user_packet')->where('user_id', '=', 100267)->where('packet_id', '=', 31)->update([
                'is_active' => false
            ]);
            
            DB::table('user_packet')->where('user_id', '=', 100274)->where('packet_id', '=', 33)->update([
            	'is_active' => false
            ]);
//
//            DB::table('user_operation')->where('author_id', '=', 100082)->where('recipient_id', '=', 100082)
//                ->whereDate('created_at', '2021-04-07')->delete();
//
            $user = \App\Models\Users::where('user_id', '=', 100267)->first();
            $user->personal_sv_balance = $user->personal_sv_balance - 1;
            $user->save();
		
		    $user1 = \App\Models\Users::where('user_id', '=', 100263)->first();
		    $user1->group_sv_balance = $user1->group_sv_balance - 6;
		    $user1->save();
		
		    $user2 = \App\Models\Users::where('user_id', '=', 100274)->first();
		    $user2->group_sv_balance = $user2->group_sv_balance - 5;
		    $user2->save();

//            $users1 = \App\Models\Users::whereIn('user_id',  [100124, 100103, 100088, 100052, 100048, 100047, 46,
// 11])->get();
//            foreach($users1 as $user) {
//                $user->gv_balance = $user->gv_balance - 100;
//                $user->user_money = $user->user_money - 6;
//                $user->save();
//            }
//
//            $user2 = \App\Models\Users::where('user_id', '=', '100124')->first();
//            $user2->user_money = $user2->user_money - 42;
//            $user2->save();
//
//            $user3 = \App\Models\Users::where('user_id', '=', '9')->first();
//            $user3->user_money = $user3->user_money - 6;
//            $user3->save();
        }
    }
}
