<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListInstitute extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ListInstitute')->insert([
            [
              'caption' => 'ИТ'
            ],
        ]);
    }
}
