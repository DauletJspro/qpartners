<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddActiveAndNoActive extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'Активный клиент',
            'id_select' => 1
        ]);

        DB::table('positions')->insert([
            'name' => 'Неактивный клиент',
            'id_select' => 0
        ]);
    }
}
