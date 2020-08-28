<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropNotNeccessaryCoumnsFromUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'speaker_id',
                'is_speaker',
                'is_director_office',
                'password_original',
                'left_child_profit',
                'is_left_part',
                'level',
                'is_left_config',
                'right_child_profit',
                'qualification_profit',
                'is_valid_document',
                'office_limit',
                'office_month_profit',
                'office_register_date',
                'week_qualification_profit',
                'paybox_balance',
                'user_cash',
                'user_share2',
                'auto_bonus',
                'home_bonus',
                'iin',
                'is_active'
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
