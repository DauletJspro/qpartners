<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeProgrammName extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cooperative_programms')->truncate();

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Тулпар',
            'program_code' => '1'
        ]);
        DB::table('cooperative_programms')->insert([
            'program_name' => 'Тулпар +',
            'program_code' => '2'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Баспана',
            'program_code' => '3'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Баспана +',
            'program_code' => '4'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Qoldau',
            'program_code' => '5'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Qamqor',
            'program_code' => '6'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Jastar',
            'program_code' => '7'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Jas Otau',
            'program_code' => '8'
        ]);

    }
}
