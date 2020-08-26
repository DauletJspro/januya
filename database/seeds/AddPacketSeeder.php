<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->truncate();
        \App\Models\Packet::create([
            'packet_id' => 1,
            'packet_name_ru' => 'Small',
            'packet_price' => 20,
            'is_show' => true,
            'sort_num' => 1,
            'packet_css_color' => '55b83f',
            'packet_available_level' => 4,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение + 1 Продукт + Back office',
            'packet_lection' => '',
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => \App\Models\UserStatus::CLIENT,
            'is_upgrade_packet' => true,
        ]);
        \App\Models\Packet::create([
            'packet_id' => 2,
            'packet_name_ru' => 'Medium',
            'packet_price' => 60,
            'is_show' => true,
            'sort_num' => 2,
            'packet_css_color' => '2285E3',
            'packet_available_level' => 6,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение + 5 Продукт + Back office',
            'packet_lection' => '',
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => \App\Models\UserStatus::CONSULTANT,
            'is_upgrade_packet' => true,
        ]);

        \App\Models\Packet::create([
            'packet_id' => 3,
            'packet_name_ru' => 'Large',
            'packet_price' => 120,
            'is_show' => true,
            'sort_num' => 3,
            'packet_css_color' => 'FE408A',
            'packet_available_level' => 8,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение + 10 Продукт + Back office',
            'packet_lection' => '',
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => \App\Models\UserStatus::MANAGER,
            'is_upgrade_packet' => true,
        ]);

        \App\Models\Packet::create([
            'packet_id' => 4,
            'packet_name_ru' => 'VIP',
            'packet_price' => 240,
            'is_show' => true,
            'sort_num' => 4,
            'packet_css_color' => '2285E3',
            'packet_available_level' => 10,
            'packet_desc_ru' => 'Здесь будет подробнее описание пакета',
            'packet_thing' => 'Обучение ACADEMY + 10 Продукт + 10 VIP Продукт + Back office',
            'packet_lection' => '',
            'currency_id' => \App\Models\Currency::PV,
            'packet_status_id' => \App\Models\UserStatus::DIRECTOR,
            'is_upgrade_packet' => true,
        ]);
    }
}
