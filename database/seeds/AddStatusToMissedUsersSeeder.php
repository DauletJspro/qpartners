<?php

use Illuminate\Database\Seeder;

class AddStatusToMissedUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_packets = \App\Models\UserPacket::where(['is_active' => 1])->orderBy('created_at')->get();
        foreach ($user_packets as $user_packet) {
            $user = \App\Models\Users::where(['user_id' => $user_packet->user_id])->first();
            $packet = \App\Models\Packet::where(['packet_id' => $user_packet->packet_id])->first();
            $user->status_id = $packet->packet_status_id;
            $user->save();
        }
    }
}
