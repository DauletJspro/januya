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
                'name' => 'Жан',
                'phone' => +77716742555,
                'email' => 'janelim.kz@gmail.com',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Marat001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Елім',
                'middle_name' => '',
                'recommend_user_id' => null,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'janelim',
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
                'name' => 'Админ',
                'phone' => +77078059782,
                'email' => 'janelim@mail.ru',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Admin001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Компания',
                'middle_name' => '',
                'recommend_user_id' => 1,
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
                'parent_id' => 1,
                'instagram' => '',

            ]
        );
        \App\Models\Users::create(
            [
                'user_id' => 3,
                'name' => 'Natural',
                'phone' =>  +77786312333,
                'email' => 'naturalmarket@mail.ru',
                'avatar' => '/media/default.png',
                'role_id' => 1,
                'is_interest_holder' => 0,
                'share' => 0,
                'password' => Hash::make('62Natural001001001'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => '',
                'is_ban' => 0,
                'last_name' => 'Market',
                'middle_name' => '',
                'recommend_user_id' => 2,
                'city_id' => 2,
                'user_money' => 0,
                'office_director_id' => null,
                'login' => 'naturalmarket',
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
