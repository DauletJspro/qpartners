<?php

use Illuminate\Database\Seeder;

class SendGvToPassiveUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passiveUserWithPackets = \App\Models\Users::leftJoin('user_packet', 'user_packet.user_id', '=', 'users.user_id')
            ->where(['user_packet.is_active' => true])
            ->where(['users.is_activated' => false])
            ->whereIn('user_packet.packet_id', \App\Models\Packet::actualPassivePackets())
            ->get();

        foreach ($passiveUserWithPackets as $key => $user) {
            $command_value = 0;
            foreach ($user->childs as $child) {
                $command_value = $command_value + $child->pv_balance + $child->gv_balance;
            }
            if ($command_value) {
                $user->gv_balance = $user->gv_balance + $command_value;
                if ($user->save()) {
                    $parent = \App\Models\Users::where(['user_id' => $user->recommend_user_id])->first();
                    app(\App\Http\Controllers\Admin\PacketController::class)->checkForPremium($parent->user_id);
                    var_dump('#-' . $key . ' sent to ' . $user->login . ' ' . $command_value . ' gv ');
                }
            }
        }
        // Check for premium Roza1
        app(\App\Http\Controllers\Admin\PacketController::class)->checkForPremium(100347);
    }
}
