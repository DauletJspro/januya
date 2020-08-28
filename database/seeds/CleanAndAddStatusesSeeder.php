<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanAndAddStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->truncate();

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::CLIENT,
            'user_status_name' => 'Клиент',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 1,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::CONSULTANT,
            'user_status_name' => 'Консультант',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 2,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::MANAGER,
            'user_status_name' => 'Менеджер',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 3,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::DIRECTOR,
            'user_status_name' => 'Директор',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 4,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::BRONZE_DIRECTOR,
            'user_status_name' => 'Бронзовый директор',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 5,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::SLIVER_DIRECTOR,
            'user_status_name' => 'Серебряный директор',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 6,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::GOLD_DIRECTOR,
            'user_status_name' => 'Золотой директор',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 7,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::BRILLIANT_DIRECTOR,
            'user_status_name' => 'Бриллиантовый директор',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 8,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


    }
}
