<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToGapCardItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gap_card_items', function (Blueprint $table) {
            $table->dropColumn('title_kz');
            $table->dropColumn('title_ru');
            $table->dropColumn('description_kz');
            $table->dropColumn('price');
            $table->integer('user_id')->after('id');
            $table->string('brand_name')->after('user_id');
            $table->string('company_name')->after('brand_name');
            $table->integer('city_id')->after('company_name');
            $table->string('office')->after('city_id');
            $table->integer('phone')->after('office');
            $table->string('instagram')->after('phone');
            $table->string('site')->after('instagram');
            $table->string('house')->after('site');
            $table->string('street')->after('house');
            $table->string('district')->after('street')->nullable();
            $table->integer('is_checked')->default(0);
            $table->longText('full_description_ru');
            $table->index('user_id');
            $table->index('city_id');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gap_card_items', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('brand_name');
            $table->dropColumn('company_name');
            $table->dropColumn('city_id');
            $table->dropColumn('office');
            $table->dropColumn('phone');
            $table->dropColumn('instagram');
            $table->dropColumn('site');
            $table->dropColumn('house');
            $table->dropColumn('street');
            $table->dropColumn('district');
            $table->dropColumn('is_checked');
            $table->dropIndex(['user_id']);
            $table->dropIndex(['city_id']);
            $table->dropIndex(['is_checked']);
        });
    }
}
