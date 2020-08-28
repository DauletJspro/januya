<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteNotNeccessaryColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_status', function (Blueprint $table) {
            $table->dropColumn('user_status_share');
            $table->dropColumn('user_month_activation_money');
            $table->dropColumn('user_status_minimum_money');
            $table->dropColumn('user_status_binar_procent');
            $table->dropColumn('user_status_binar_limit_money');
            $table->dropColumn('user_status_binar_limit_money_in_week');
            $table->dropColumn('condition_minumum_status_id');
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
