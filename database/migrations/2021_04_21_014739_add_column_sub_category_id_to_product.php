<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSubCategoryIdToProduct extends Migration
{
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('sub_category_id')->after('category_id');
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('sub_category_id');
        });
    }
}
