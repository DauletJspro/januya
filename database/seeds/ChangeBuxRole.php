<?php

use Illuminate\Database\Seeder;

class ChangeBuxRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('user_id','=', 158)->update([
           'role_id' => 1
        ]);

    }
}
