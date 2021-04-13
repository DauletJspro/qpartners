<?php

use Illuminate\Database\Seeder;

class AddPVandPSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\Users::whereIn('user_id', [15, 13, 20, 46, 224, 226, 228, 100002, 100047, 100048, 100051,
	        100080, 100139, 100176, 100177, 100178, 100186, 100193, 100210, 9])->get();
        foreach ($users as $user){
        	$user->personal_sv_balance = $user->personal_sv_balance + 4;
        	$user->save();
        }
    }
}
