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
            ListAccountType::class,
            ListEmployeePost::class,
            ListTeacherPost::class,

            ListRateType::class,

            ListInstitute::class,
            ListFaculty::class,

            ListAcademicTitle::class,
            ListDegree::class,
            ListScienceType::class,

            ListSystemSection::class,
            ListSubSystem::class,

            Employees::class,
            Accounts::class,
            AccountsRights::class
        ]);
    }
}
