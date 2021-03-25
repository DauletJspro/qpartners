<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeActivationBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')->where('operation_type_id','=', 39)->update([
            'operation_type_name_ru' => 'Социальный бонус и статус GAP',
        ]);
    }
}
