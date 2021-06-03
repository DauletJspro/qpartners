<?php

use Illuminate\Database\Seeder;

class AddRoleForMarketolog extends Seeder
{
    /**aå
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'talgat',
            'role_name_ru' => 'market',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
