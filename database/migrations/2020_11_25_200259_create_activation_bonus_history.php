<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationBonusHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activation_bonus_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_user');
            $table->integer('to_user');
            $table->string('comment');
            $table->integer('activation_operation_type');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activation_bonus_history');
    }
}
