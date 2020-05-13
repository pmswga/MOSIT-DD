<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListScienceType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_science_type')->insert([
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
