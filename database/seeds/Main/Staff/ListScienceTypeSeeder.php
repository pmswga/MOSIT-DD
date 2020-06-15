<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListScienceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SCIENCE_TYPE)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SCIENCE_TYPE)->insert([
                [
                    'idScienceType' => 1,
                    'caption' => 'Технические науки'
                ],
                [
                    'idDegree' => 2,
                    'caption' => 'Физико-математические науки'
                ]
            ]);
        }
    }
}
