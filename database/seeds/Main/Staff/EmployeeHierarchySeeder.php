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
                'idEmployeeSuper' => 7,
                'idEmployeeSub' => 9
            ],
            [
                'idEmployeeSuper' => 7,
                'idEmployeeSub' => 15
            ],
            [
                'idEmployeeSuper' => 7,
                'idEmployeeSub' => 16
            ],
            [
                'idEmployeeSuper' => 9,
                'idEmployeeSub' => 1
            ],
            [
                'idEmployeeSuper' => 9,
                'idEmployeeSub' => 2
            ],
        ]);
    }
}
