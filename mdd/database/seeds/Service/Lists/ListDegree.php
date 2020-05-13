<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListDegree extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_degree')->insert([
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
