<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('role')
            ->where(['role_id' => 1])
            ->update([
                'name' => 'admin',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);

        DB::table('role')
            ->where(['role_id' => 2])
            ->update([
                'name' => 'partner',
                'role_name_ru' => 'партнер',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);

        DB::table('role')
            ->where(['role_id' => 3])
            ->update([
                'name' => 'moderator',
                'role_name_ru' => 'модератор',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);


        DB::table('role')
            ->insert([
                [
                    'role_id' => 4,
                    'name' => 'accountant',
                    'role_name_ru' => 'бухгалтер',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                ],
                [
                    'role_id' => 5,
                    'name' => 'entrepreneur',
                    'role_name_ru' => 'предприниматель',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                ],
                [
                    'role_id' => 6,
                    'name' => 'consumer',
                    'role_name_ru' => 'потрибитель',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                ],
                [
                    'role_id' => 7,
                    'name' => 'seller',
                    'role_name_ru' => 'продавец',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                ],
                [
                    'role_id' => 8,
                    'name' => 'user',
                    'role_name_ru' => 'пользователь',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                ]
            ]);
    }
}
