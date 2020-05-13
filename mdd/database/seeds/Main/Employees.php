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
                'idEmployee' => 1,
                'secondName' => 'Михайлова',
                'firstName' => 'Евгения',
                'patronymic' => 'Константиновна',
                'personalPhone' => '+79036233166',
                'personalEmail' => 'michaylova1996@mail.ru',
                'idFaculty' => 1,
                'idEmployeePost' => 2,
            ],
            [
                'idEmployee' => 2,
                'secondName' => 'Трушин',
                'firstName' => 'Степан',
                'patronymic' => 'Михайлович',
                'personalPhone' => '',
                'personalEmail' => 'stepan@mail.ru',
                'idFaculty' => 1,
                'idEmployeePost' => 2,
            ],
            [
                'idEmployee' => 3,
                'secondName' => 'Синицын',
                'firstName' => 'Иван',
                'patronymic' => 'Васильевич',
                'personalPhone' => '+79151078294',
                'personalEmail' => 'ivshin@mail.ru',
                'idFaculty' => 1,
                'idEmployeePost' => 2,
            ]
        ]);
    }
}
