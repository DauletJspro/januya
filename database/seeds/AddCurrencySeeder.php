<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency')->truncate();
        \App\Models\Currency::create([
            'currency_name' => 'dollar',
            'amount_in_kzt' => '500',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\Currency::create([
            'currency_name' => 'Personal value (PV)',
            'amount_in_kzt' => '600',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\Currency::create([
            'currency_name' => 'Group value (GV)',
            'amount_in_kzt' => '500',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        \App\Models\Currency::create([
            'currency_name' => 'Customer value (CV)',
            'amount_in_kzt' => '500',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
