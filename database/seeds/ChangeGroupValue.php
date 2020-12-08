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
            'operation_type_name_ru' => 'Груповой объем'
        ]);

    }
}
