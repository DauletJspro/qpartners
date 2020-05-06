<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoryIdToTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        if(!Schema::hasColumn('product', 'category_id')){
//            Schema::table('product', function (Blueprint $table) {
//                $table->integer('category_id')->unsigned();
//            });
//        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
