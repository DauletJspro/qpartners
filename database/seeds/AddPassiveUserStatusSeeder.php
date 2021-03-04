<?php

use Illuminate\Database\Seeder;

class AddPassiveUserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::JASTAR,
            'user_status_name' => 'Jastar',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 129,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::QAMQOR,
            'user_status_name' => 'Qamqor',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 130,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::JAS_OTAU,
            'user_status_name' => 'Jas Otau',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 131,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::QOLDAU,
            'user_status_name' => 'Qoldau',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 132,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::BASPANA_PLUS,
            'user_status_name' => 'Baspana PLus',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 133,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::BASPANA,
            'user_status_name' => 'Baspana PLus',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 134,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::TULPAR_PLUS,
            'user_status_name' => 'Baspana PLus',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 135,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::TULPAR,
            'user_status_name' => 'Baspana PLus',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 136,
            'is_soc_status' => true,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
