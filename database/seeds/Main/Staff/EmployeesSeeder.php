<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)->insert(DataSeeder::$employees);
        }
    }
}
