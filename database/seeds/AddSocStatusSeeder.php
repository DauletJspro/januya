<?php

use Illuminate\Database\Seeder;

class AddSocStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP,
            'user_status_name' => 'VIP',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 10,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_2,
            'user_status_name' => 'VIP 2ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 11,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_3,
            'user_status_name' => 'VIP 3ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 12,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_4,
            'user_status_name' => 'VIP 4ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 13,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_5,
            'user_status_name' => 'VIP 5ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 14,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_6,
            'user_status_name' => 'VIP 6ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 15,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_7,
            'user_status_name' => 'VIP 7ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 16,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \App\Models\UserStatus::create([
            'user_status_id' => \App\Models\UserStatus::VIP_8,
            'user_status_name' => 'VIP 8ур',
            'user_status_money' => 0,
            'user_status_available_level' => 0,
            'sort_num' => 17,
            'is_show' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
