<?php

use Illuminate\Database\Seeder;

class ChangePacketName extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packet')->where('packet_id','=', 5)->update([
            'packet_name_ru' => 'Пайщик'
        ]);
        DB::table('packet')->where('packet_id','=', 7)->update([
            'packet_name_ru' => 'Корея АВТО'
        ]);
        DB::table('packet')->where('packet_id','=', 4)->update([
            'packet_name_ru' => 'VIP Пайщик'
        ]);
    }
}
