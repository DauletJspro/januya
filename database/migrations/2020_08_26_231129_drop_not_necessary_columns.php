<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropNotNecessaryColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packet', function (Blueprint $table) {
            $table->dropColumn('packet_name_kz');
            $table->dropColumn('packet_name_en');
            $table->dropColumn('packet_image');
            $table->dropColumn('packet_url');
            $table->dropColumn('packet_share');
            $table->dropColumn('packet_desc_kz');
            $table->dropColumn('packet_desc_en');
            $table->dropColumn('speaker_procent');
            $table->dropColumn('is_portfolio');
            $table->dropColumn('office_procent');
            $table->dropColumn('packet_type');
            $table->dropColumn('is_auto');
            $table->dropColumn('packet_status_money');
            $table->dropColumn('packet_status_name');
            $table->dropColumn('packet_status_thing');
            $table->dropColumn('is_recruite_profit');
            $table->dropColumn('is_usual_packet');
            $table->dropColumn('condition_minimum_status_id');
            $table->dropColumn('upgrade_type');
            $table->dropColumn('is_old');
            $table->dropColumn('pv');
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
