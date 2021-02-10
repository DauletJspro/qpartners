<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGapStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->
        insert([
            'user_status_id' => 44,
            'user_status_name' => 'Актив 1',
            'sort_num' => 120,
            'is_show' => true,
            'is_soc_status' => true,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('user_status')->
        insert([
            'user_status_id' => 45,
            'user_status_name' => 'Актив 2',
            'sort_num' => 121,
            'is_show' => true,
            'is_soc_status' => true,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('user_status')->
        insert([
            'user_status_id' => 46,
            'user_status_name' => 'Актив 3',
            'sort_num' => 122,
            'is_show' => true,
            'is_soc_status' => true,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('user_status')->
        insert([
            'user_status_id' => 47,
            'user_status_name' => 'Пассив',
            'sort_num' => 123,
            'is_show' => true,
            'is_soc_status' => true,
            'created_at' => date('Y-m-d H:i:s'),
        ]);


    }
}
