<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRoleForTalgatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'Marketing',
            'role_name_ru' => 'Маркетолог',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
