<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListInstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_institute')->insert([
            [
                'idInstitute' => 1,
                'caption' => 'ИТ'
            ],
        ]);
    }
}
