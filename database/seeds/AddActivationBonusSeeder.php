<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddActivationBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')->insert([
            [
                'operation_type_id' => 35,
                'operation_type_name_ru' => 'Активационный бонус',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'operation_type_id' => 36,
                'operation_type_name_ru' => 'Бонус за приглашение',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'operation_type_id' => 37,
                'operation_type_name_ru' => 'Ежемесячная обязательная активация 12pv (6000 тг)',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'operation_type_id' => 38,
                'operation_type_name_ru' => 'Командный бонус GAP в размере 1sv',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'operation_type_id' => 39,
                'operation_type_name_ru' => 'Премиум бонус и статус GAP',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
