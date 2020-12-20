<?php

use Illuminate\Database\Seeder;
use  Illuminate\Database\Query\Builder;
class CreateCategoryForTickets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category2::create([
            'name' => 'Проблема с бонусами'
        ]);
        \App\Models\Category2::create([
            'name' => 'Проблема с верификации'
        ]);
        \App\Models\Category2::create([
            'name' => 'Проюлема с покупкой пакета'
        ]);

        \App\Models\Category2::create([
            'name' => 'Другое'
        ]);
    }
}
