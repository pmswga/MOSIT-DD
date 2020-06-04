<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListFileTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG)->insert([
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::IP,
                'caption' => 'Индивидуальный план',
            ],
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::ORDER,
                'caption' => 'Приказ',
            ],
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::PROTOCOL,
                'caption' => 'Протокол'
            ]
        ]);
    }
}
