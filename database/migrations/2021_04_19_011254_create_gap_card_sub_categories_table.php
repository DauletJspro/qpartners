<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGapCardSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gap_card_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_kz')->nullable();
            $table->string('title_ru')->nullable();
            $table->integer('gap_card_category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gap_card_sub_categories');
    }
}
