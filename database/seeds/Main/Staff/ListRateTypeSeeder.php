<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListRateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_RATE_TYPE)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_RATE_TYPE)->insert([
                [
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::STAFF,
                    'caption' => 'Штатная',
                ],
                [
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::INTERNAL,
                    'caption' => 'Внутренний совместитель',
                ],
                [
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::EXTERNAL,
                    'caption' => 'Внешний совместитель',
                ]
            ]);
        }
    }
}
