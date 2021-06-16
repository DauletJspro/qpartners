<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('price_partner')->after('product_price');
            $table->integer('price_client')->after('price_partner');
            $table->integer('price_shareholder')->after('price_client');
            $table->integer('ball_partner')->after('ball');
            $table->integer('ball_client')->after('ball_partner');
            $table->integer('ball_shareholder')->after('ball_client');

        });
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
