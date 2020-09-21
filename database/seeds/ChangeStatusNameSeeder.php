<?php

use Illuminate\Database\Seeder;

class ChangeStatusNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::PREMIUM_MANAGER])->update(['user_status_name' => 'Premium Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::ELITE_MANAGER])->update(['user_status_name' => 'Elite Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::VIP_MANAGER])->update(['user_status_name' => 'VIP Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::BRONZE_MANAGER])->update(['user_status_name' => 'Бронзовый Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::SILVER_MANAGER])->update(['user_status_name' => 'Серебряный Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::GOLD_MANAGER])->update(['user_status_name' => 'Золотой Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::RUBIN_MANAGER])->update(['user_status_name' => 'Рубиновый Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::SAPPHIRE_MANAGER])->update(['user_status_name' => 'Сапфировый Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::EMERALD_MANAGER])->update(['user_status_name' => 'Изумрудный Менеджер']);
        \App\Models\UserStatus::where(['user_status_id' => \App\Models\UserStatus::DIAMOND_MANAGER])->update(['user_status_name' => 'Бриллиантовый Менеджер']);
    }
}
