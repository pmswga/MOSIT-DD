<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [];

        foreach (DataSeeder::$employees as $employee) {
            if ($employee['idEmployeePost'] == 1) { // не учитывает заместителей, заведующего и учёного секретаря
                $teachers[] = [
                    'idTeacher' => $employee['idEmployee'],
                    'idEmployee' => $employee['idEmployee'],
                    'idDegree' => 0,
                    'idAcademicTitle' => 0,
                    'idScienceType' => 0,
                    'idTeacherPost' => 0
                ];
            }
        }

        DB::table('TeachersSeeder')->insert($teachers);
    }
}
