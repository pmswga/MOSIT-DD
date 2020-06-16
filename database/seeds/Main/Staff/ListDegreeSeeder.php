<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_DEGREE)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_DEGREE)->insert([
                [
                    'idDegree' => 1,
                    'caption' => 'Кандидат наук'
                ],
                [
                    'idDegree' => 2,
                    'caption' => 'Доктор наук'
                ],
                [
                    'idDegree' => 3,
                    'caption' => 'Старший научный сотрудник'
                ],
            ]);
        }
    }
}
