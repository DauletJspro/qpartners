<?php

use Illuminate\Database\Seeder;

class ChangeProgrammName extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cooperative_programms')->insert([
            'program_name' => 'Тулпар',
            'program_code' => '1'
        ]);
        DB::table('cooperative_programms')->insert([
            'program_name' => 'Тулпар +',
            'program_code' => '1'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Баспана',
            'program_code' => '2'
        ]);

        DB::table('cooperative_programms')->insert([
            'program_name' => 'Баспана +',
            'program_code' => '2'
        ]);

    }
}
