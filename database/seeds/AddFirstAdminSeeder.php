<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AddFirstAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Users::create(
            [
                'user_id' => 1,
                'name' => 'Admin',
                'phone' => +77716742555,
                'email' => 'admin.kz@gmail.com',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Admin001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Админ',
                'middle_name' => '',
                'recommend_user_id' => null,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'admin',
                'office_name' => '',
                'hash_email' => '',
                'is_confirm_email' => 1,
                'status_id' => null,
                'is_activated' => 1,
                'activated_date' => date('Y-m-d H:i:s'),
                'parent_id' => null,
                'instagram' => '',

            ]
        );
        \App\Models\Users::create(
            [
                'user_id' => 2,
                'name' => 'Eraly',
                'phone' => +77078059782,
                'email' => 'eraly@mail.ru',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Admin001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Eraly',
                'middle_name' => '',
                'recommend_user_id' => 1,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'eraly',
                'office_name' => '',
                'hash_email' => '',
                'is_confirm_email' => 1,
                'status_id' => null,
                'is_activated' => 1,
                'activated_date' => date('Y-m-d H:i:s'),
                'parent_id' => 1,
                'instagram' => '',

            ]
        );
        \App\Models\Users::create(
            [
                'user_id' => 3,
                'name' => 'Almas',
                'phone' =>  +77786312333,
                'email' => 'almas@mail.ru',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Natural001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'almas',
                'middle_name' => '',
                'recommend_user_id' => 2,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'almas',
                'office_name' => '',
                'hash_email' => '',
                'is_confirm_email' => 1,
                'status_id' => null,
                'is_activated' => 1,
                'activated_date' => date('Y-m-d H:i:s'),
                'parent_id' => 2,
                'instagram' => '',

            ]
        );
    }
}
