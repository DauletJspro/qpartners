<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	
	class DeleteUP extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_operation')->where('created_at','=', '2021-04-10 17:33')->delete();
	    DB::table('user_operation')->where('created_at','=', '2021-04-10 17:34')->delete();
	    DB::table('user_operation')->where('created_at','=', '2021-04-10 17:38')->delete();
	    DB::table('user_operation')->where('created_at','=', '2021-04-10 17:41')->delete();
	    DB::table('user_operation')->where('created_at','=', '2021-04-10 17:47')->delete();
	    DB::table('user_operation')->where('created_at','=', '2021-04-10 17:49')->delete();
	
	
	
	
	
    }
}
