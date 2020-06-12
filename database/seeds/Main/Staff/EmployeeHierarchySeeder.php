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
        DB::table(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY)->insert([
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
        ]);
    }
}
