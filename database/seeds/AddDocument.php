<?php

use Illuminate\Database\Seeder;

class AddDocument extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document')->insert([
           'document_name_ru' => 'Квитанция №1',
            'is_show'         => 3,
            'sort_num'        => 8
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №2',
            'is_show'         => 3,
            'sort_num'        => 9
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №3',
            'is_show'         => 3,
            'sort_num'        => 9
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №4',
            'is_show'         => 3,
            'sort_num'        => 10
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №5',
            'is_show'         => 3,
            'sort_num'        => 11
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №6',
            'is_show'         => 3,
            'sort_num'        => 12
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №7',
            'is_show'         => 3,
            'sort_num'        => 13
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №8',
            'is_show'         => 3,
            'sort_num'        => 14
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №9',
            'is_show'         => 3,
            'sort_num'        => 15
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №10',
            'is_show'         => 3,
            'sort_num'        => 16
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №11',
            'is_show'         => 3,
            'sort_num'        => 17
        ]);

        DB::table('document')->insert([
            'document_name_ru' => 'Квитанция №12',
            'is_show'         => 3,
            'sort_num'        => 18
        ]);
    }
}
