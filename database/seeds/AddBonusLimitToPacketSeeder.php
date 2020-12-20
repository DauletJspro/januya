<?php

use Illuminate\Database\Seeder;

class AddBonusLimitToPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        \App\Models\Packet::where(['packet_id' => 1])->update(['bonus_price_limit' => 500]);
        \App\Models\Packet::where(['packet_id' => 2])->update(['bonus_price_limit' => 1000]);
        \App\Models\Packet::where(['packet_id' => 3])->update(['bonus_price_limit' => 99999999]);
        \App\Models\Packet::where(['packet_id' => 4])->update(['bonus_price_limit' => 0]);
    }
}
