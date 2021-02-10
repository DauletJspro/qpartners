<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPersonalSvValueToOperationTypeSeeder extends Seeder
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
                'operation_type_id' => 42,
                'operation_type_name_ru' => 'Персональный бонус GAP в размере 1sv',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
