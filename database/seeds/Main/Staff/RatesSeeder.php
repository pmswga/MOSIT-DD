<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_RATES)->count() === 0) {
            $rates = [];

            foreach (DataSeeder::$employees as $employee) {
                $rates[] = [
                    'idEmployee' => $employee['idEmployee'],
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::STAFF,
                    'rateValue' => 0.0
                ];
                $rates[] = [
                    'idEmployee' => $employee['idEmployee'],
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::INTERNAL,
                    'rateValue' => 0.0
                ];
                $rates[] = [
                    'idEmployee' => $employee['idEmployee'],
                    'idRateType' => \App\Core\Constants\ListRateTypeConstants::EXTERNAL,
                    'rateValue' => 0.0
                ];
            }

            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_RATES)->insert($rates);
        }
    }
}
