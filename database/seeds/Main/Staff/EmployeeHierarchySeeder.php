<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY)->count() == 0) {

            $rights = [
                [
                    'idEmployeeSup' => 7,
                    'idEmployeeSub' => 9
                ],
                [
                    'idEmployeeSup' => 7,
                    'idEmployeeSub' => 15
                ],
                [
                    'idEmployeeSup' => 7,
                    'idEmployeeSub' => 16
                ],
                [
                    'idEmployeeSup' => 7,
                    'idEmployeeSub' => 5
                ],
                [
                    'idEmployeeSup' => 9,
                    'idEmployeeSub' => 1
                ],
                [
                    'idEmployeeSup' => 9,
                    'idEmployeeSub' => 2
                ],
            ];

            foreach (DataSeeder::$employees as $employee) {

                if ($employee['idEmployeePost'] === \App\Core\Constants\ListEmployeePostConstants::TEACHER) {
                    $rights[] = [
                        'idEmployeeSup' => 7,
                        'idEmployeeSub' => $employee['idEmployee']
                    ];
                    $rights[] = [
                        'idEmployeeSup' => 9,
                        'idEmployeeSub' => $employee['idEmployee']
                    ];
                    $rights[] = [
                        'idEmployeeSup' => 16,
                        'idEmployeeSub' => $employee['idEmployee']
                    ];
                }
            }

            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY)->insert($rights);
        }
    }
}
