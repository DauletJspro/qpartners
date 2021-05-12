<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandNameToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('brand_name')->nullable();
            $table->string('organization_name')->nullable();
            $table->integer('bin')->nullable()->after('iin');
            $table->integer('agent_id')->after('inviter_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['brand_name', 'organization_name', 'bin', 'agent_id']);
        });
    }
}
