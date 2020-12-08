<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeGroupValue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')->where('operation_type_id', 11)->update([
            'operation_type_name_ru' => 'Групповой объем'
        ]);
        DB::table('operation_type')->insert([
            'operation_type_id'      => 41,
            'operation_type_name_ru' => 'Квалификационный доход',
            'created_at'             => date('Y-m-d H:i:s'),
        ]);
    }
}
