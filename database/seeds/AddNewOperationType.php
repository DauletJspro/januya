<?php

use Illuminate\Database\Seeder;

class AddNewOperationType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_type')->insert([
            'operation_type_id' => 50,
            'operation_type_name_ru' => 'Доход за приглашение'
        ]);
    }
}
