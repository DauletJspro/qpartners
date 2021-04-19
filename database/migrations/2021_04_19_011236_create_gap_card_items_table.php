<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGapCardItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gap_card_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_kz')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('description_kz')->nullable();
            $table->string('description_ru')->nullable();
            $table->string('image')->nullabe();
            $table->integer('discount_percentage')->nullable();
            $table->integer('price')->nullable();
            $table->integer('gap_card_sub_category_id')->nullable();
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
        Schema::dropIfExists('gap_card_items');
    }
}
