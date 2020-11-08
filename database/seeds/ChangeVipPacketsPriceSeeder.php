<?php

use Illuminate\Database\Seeder;

class ChangeVipPacketsPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::VIP_ECONOMY])->update(['packet_price' => 400]);
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::VIP_STANDARD])->update(['packet_price' => 400]);
        \App\Models\Packet::where(['packet_id' => \App\Models\Packet::VIP_PREMIUM])->update(['packet_price' => 400]);
    }
}
