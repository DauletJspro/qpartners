<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGroupSvValueToOperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')
            ->insert([
                'operation_type_id' => 38,
                'operation_type_name_ru' => 'Групповой бонус GAP (sv)',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
