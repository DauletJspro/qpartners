<?php

use Illuminate\Database\Seeder;

class AddTalgatUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Users::create(
            [
                'name' => 'Talgat',
                'phone' => +888888888,
                'email' => 'talgat.kz@gmail.com',
                'avatar' => '/media/default.png',
                'role_id' => 9,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Talgat'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Admin',
                'middle_name' => '',
                'recommend_user_id' => null,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'talgatadmin',
                'office_name' => '',
                'hash_email' => '',
                'is_confirm_email' => 1,
                'status_id' => null,
                'is_activated' => 1,
                'activated_date' => date('Y-m-d H:i:s'),
                'parent_id' => null,
                'instagram' => '',

            ]
        );
    }
}
