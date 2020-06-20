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
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS)->count() === 0) {
            $teachers = [];

            foreach (DataSeeder::$employees as $employee) {
                if (
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::TEACHER or
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::HEAD_DEPARTMENT or
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::DEPUTY_MET_WORK or
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::DEPUTY_SCI_WORK or
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::DEPUTY_MTO or
                    $employee['idEmployeePost'] == \App\Core\Constants\ListEmployeePostConstants::SCIENCE_SECRETARY
                ) {
                    $teachers[] = [
                        'idTeacher' => $employee['idEmployee'],
                        'idDegree' => 0,
                        'idAcademicTitle' => 0,
                        'idScienceType' => 0,
                        'idTeacherPost' => 0
                    ];
                }
            }

            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS)->insert($teachers);
        }
    }
}
