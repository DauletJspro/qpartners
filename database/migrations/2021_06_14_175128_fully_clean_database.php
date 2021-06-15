<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FullyCleanDatabase extends Migration
{
    /**
     * ---- TABLE users ------
     * share
     * sv_balance
     * last_status
     * super_balance
     * password_original
     * super_status_id
     * left_child_profit
     * level
     * right_child_profit
     * qualification_profit
     * office_month_profit
     * auto_bonus
     * home_bonus
     * cumulative_bonus
     * is_active
     * group_id
     */


    /**
     * ---- TABLE  user_packet
     * recommend_user_count
     * is_used
     * is_portfolio
     * is_epay
     */


    /**
     *  ---- TABLE packet
     * packet_name_kz
     * packet_name_en
     * packet_share
     * packet_desc_kz
     * packet_desc_enpacket
     * speaker_procent
     * is_portfolio
     * office_procent
     * is_auto
     * packet_status_money
     * packet_status_name
     * packet_status_thing
     * is_old
     */


    /*
     * ----- TABLE user_operation
     *  fond_id
     *
     */


    /*
     *  ---- TABLE about
     *  about_redirect
     *
     */

    /*
     * ----- TABLE city
     * city_text_en
     * city_text_ru
     * city_text_kz
     * city_desc_kz
     * city_desc_ru
     * city_desc_en
     *
     */


    /*
     * ---- TABLE country
     * country_desc_kz
     * country_desc_ru
     * country_desc_en
     */


    /*
     * ---- TABLE partner
     * partner_desc_kz
     * partner_desc_ru
     * partner_desc_en
     */

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'share',
                'sv_balance',
                'last_status',
                'super_balance',
                'password_original',
                'super_status_id',
                'left_child_profit',
                'level',
                'right_child_profit',
                'qualification_profit',
                'office_month_profit',
                'auto_bonus',
                'home_bonus',
                'cumulative_bonus',
                'is_active',
            ]);
        });

        Schema::table('user_packet', function (Blueprint $table) {
            $table->dropColumn([
                'recommend_user_count',
                'is_used',
                'is_portfolio',
                'is_epay',
            ]);
        });

        Schema::table('packet', function (Blueprint $table) {
            $table->dropColumn([
                'packet_name_kz',
                'packet_name_en',
                'packet_share',
                'packet_desc_kz',
                'packet_desc_en',
                'speaker_procent',
                'is_portfolio',
                'office_procent',
                'is_auto',
                'packet_status_money',
                'packet_status_name',
                'packet_status_thing',
                'is_old',
            ]);
        });

        Schema::table('user_operation', function (Blueprint $table) {
            $table->dropColumn([
                'fond_id'
            ]);
        });

        Schema::table('about', function (Blueprint $table) {
            $table->dropColumn('about_redirect');
        });

        Schema::table('city', function (Blueprint $table) {
            $table->dropColumn([
                'city_text_en',
                'city_text_ru',
                'city_text_kz',
                'city_desc_kz',
                'city_desc_ru',
                'city_desc_en',
            ]);
        });

        Schema::table('country', function (Blueprint $table) {
            $table->dropColumn([
                'country_desc_kz',
                'country_desc_ru',
                'country_desc_en'
            ]);
        });

        Schema::table('partner', function (Blueprint $table) {
            $table->dropColumn([
                'partner_desc_kz',
                'partner_desc_ru',
                'partner_desc_en',
            ]);
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
