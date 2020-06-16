<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListWorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TYPE)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TYPE)->insert([
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::EDU_WORK,
                    'caption' => 'Учебная работа'
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::MET_WORK,
                    'caption' => 'Учебно-методическая работа'
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::SIC_WORK,
                    'caption' => 'Научно-исследовательская работа'
                ],
                [
                    'idWorkType' => \App\Core\Constants\ListWorkTypeConstants::ORG_WORK,
                    'caption' => 'Организационно-методическая и воспитательная работа'
                ],
            ]);
        }
    }
}
