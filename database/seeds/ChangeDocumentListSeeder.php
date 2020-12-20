<?php

use Illuminate\Database\Seeder;

class ChangeDocumentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Document::where(['document_id' => 2])->update(['is_show' => false]);
        \App\Models\Document::where(['document_id' => 4])->update(['is_show' => false]);
        \App\Models\Document::where(['document_id' => 5])->update(['is_required' => true]);
    }
}
