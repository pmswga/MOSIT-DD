<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Employees')->insert([
            [
                'idEmployee' => '1',
                'secondName' => 'Михайлова',
                'firstName' => 'Евгения',
                'patronymic' => 'Константиновна'
            ],
            [
                'idEmployee' => '2',
                'secondName' => 'Трушин',
                'firstName' => 'Степан',
                'patronymic' => 'Михайлович'
            ]
        ]);
    }
}
