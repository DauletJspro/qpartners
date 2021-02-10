<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGapUserStatussSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')
            ->insert([
                [
                    'user_status_id' => 48,
                    'user_status_name' => 'GAP 1',
                    'sort_num' => 124,
                    'is_show' => true,
                ],
                [
                    'user_status_id' => 49,
                    'user_status_name' => 'GAP 2',
                    'sort_num' => 125,
                    'is_show' => true,
                ],
                [
                    'user_status_id' => 50,
                    'user_status_name' => 'GAP 3',
                    'sort_num' => 126,
                    'is_show' => true,
                ],
                [
                    'user_status_id' => 51,
                    'user_status_name' => 'GAP 4',
                    'sort_num' => 127,
                    'is_show' => true,
                ],
                [
                    'user_status_id' => 52,
                    'user_status_name' => 'GAP 5',
                    'sort_num' => 128,
                    'is_show' => true,
                ],
            ]);
    }
}
