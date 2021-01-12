<?php

use Illuminate\Database\Seeder;

class RemoveTrashedPacketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trash_packets = \App\Models\Packet::whereIn('packet_id', [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 31
        ])->get();

        foreach ($trash_packets as $packet) {
            $packet->forceDelete();
        }
    }
}
