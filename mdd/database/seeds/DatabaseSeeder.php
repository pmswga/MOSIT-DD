<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ListAccountTypeSeeder::class,
            ListEmployeePostSeeder::class,
            ListTeacherPostSeeder::class,

            ListRateTypeSeeder::class,

            ListInstituteSeeder::class,
            ListFacultySeeder::class,

            ListAcademicTitleSeeder::class,
            ListDegreeSeeder::class,
            ListScienceTypeSeeder::class,

            ListSystemSectionSeeder::class,
            ListSubSystemSeeder::class,

            ListTicketTypeSeeder::class,

            EmployeesSeeder::class,
            EmployeeHierarchySeeder::class,
            TeachersSeeder::class,

            AccountsSeeder::class,
            AccountsRightsSeeder::class
        ]);
    }
}
