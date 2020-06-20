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
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG)->insert([
                [
                    'idFileTag' => \App\Core\Constants\ListFileTagConstants::IP,
                    'idSubSystem' => \App\Core\Constants\ListSubSystemConstants::IPS,
                    'caption' => 'Индивидуальный план',
                ],
                [
                    'idFileTag' => \App\Core\Constants\ListFileTagConstants::ORDER,
                    'idSubSystem' => \App\Core\Constants\ListSubSystemConstants::Orders,
                    'caption' => 'Приказ',
                ],
                [
                    'idFileTag' => \App\Core\Constants\ListFileTagConstants::PROTOCOL,
                    'idSubSystem' => \App\Core\Constants\ListSubSystemConstants::Protocols,
                    'caption' => 'Протокол'
                ],
                [
                    'idFileTag' => \App\Core\Constants\ListFileTagConstants::STORAGE,
                    'idSubSystem' => \App\Core\Constants\ListSubSystemConstants::Storage,
                    'caption' => 'Файл',
                ]
            ]);
        }
    }
}
