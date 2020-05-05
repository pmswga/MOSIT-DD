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
            ListFaculty::class,
            ListInstitute::class,


            ListSystemSection::class,
            ListSubSystem::class

        ]);
    }
}
