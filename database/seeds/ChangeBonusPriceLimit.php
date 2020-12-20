<?php

use Illuminate\Database\Seeder;

class ChangeBonusPriceLimit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->where('packet_id', '=', '1')->update([
           'bonus_price_limit' => 200,
           'packet_price' => 100
        ]);
        DB::table('packet')->where('packet_id', '=', '2')->update([
            'bonus_price_limit' => 500,
            'packet_price' => 200
        ]);
        DB::table('packet')->where('packet_id', '=', '3')->update([
            'bonus_price_limit' => 1000,
            'packet_price' => 300
        ]);
    }
}
