<?php

use Illuminate\Database\Seeder;

class AddVipPacketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Packet::create([
            'packet_id' => 5,
            'packet_name_ru' => 'Vip Economy',
            'packet_price' => 1000,
            'is_show' => true,
            'sort_num' => 5,
            'packet_css_color' => '732121',
            'packet_available_level' => 0,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_lection' => '',
            'level_percentage' => '14',
            'pre_percent' => 15,
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => null,
            'is_upgrade_packet' => false,
            'is_kooperative' => true
        ]);

        \App\Models\Packet::create([
            'packet_id' => 6,
            'packet_name_ru' => 'Vip Standard',
            'packet_price' => 1000,
            'is_show' => true,
            'sort_num' => 6,
            'packet_css_color' => '005548',
            'packet_available_level' => 0,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_lection' => '',
            'level_percentage' => '24',
            'pre_percent' => 30,
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => null,
            'is_upgrade_packet' => false,
            'is_kooperative' => true
        ]);

        \App\Models\Packet::create([
            'packet_id' => 7,
            'packet_name_ru' => 'Vip Premium',
            'packet_price' => 1000,
            'is_show' => true,
            'sort_num' => 7,
            'packet_css_color' => '6D50FF',
            'packet_available_level' => 0,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => '',
            'packet_lection' => '',
            'level_percentage' => '34',
            'pre_percent' => 50,
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => null,
            'is_upgrade_packet' => false,
            'is_kooperative' => true
        ]);
    }
}
