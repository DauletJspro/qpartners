<?php

use Illuminate\Database\Seeder;

class CheckUsersToPremiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\Users::whereNotNull('user_id')->get();
        foreach ($users as $user) {
            $userChildCount = isset($user->childs) ? count($user->childs) : 0;
            if ($userChildCount >= 3) {
                app(\App\Http\Controllers\Admin\PacketController::class)->checkForPremium($user->user_id);
            }
        }

    }
}
