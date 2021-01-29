<?php

use App\Models\Users;
use Illuminate\Database\Seeder;

class ChangeToActiveUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::where('role_id', '=', 2)->update([
           'is_activated' => 1
        ]);
    }
}
