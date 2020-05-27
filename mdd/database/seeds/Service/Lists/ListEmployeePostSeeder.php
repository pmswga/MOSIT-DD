<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListEmployeePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_employee_post')->insert([
            [
                'idEmployeePost' => 1,
                'caption' => 'Преподаватель'
            ],
            [
                'idEmployeePost' => 2,
                'caption' => 'Оператор ЭВМ'
            ],
            [
                'idEmployeePost' => 3,
                'caption' => 'Зам. по учебной работе'
            ],
            [
                'idEmployeePost' => 4,
                'caption' => 'Зам. по научной работе'
            ],
            [
                'idEmployeePost' => 5,
                'caption' => 'Зам. по учебно-методической работе'
            ],
            [
                'idEmployeePost' => 6,
                'caption' => 'Отвественный за МТО'
            ],
            [
                'idEmployeePost' => 7,
                'caption' => 'Ответственный за работу со студентами'
            ],
            [
                'idEmployeePost' => 8,
                'caption' => 'Учёный секретарь'
            ],
            [
                'idEmployeePost' => 9,
                'caption' => 'Зав. кафедрой'
            ]
        ]);
    }
}
