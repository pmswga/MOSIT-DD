<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListWorkTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TIMES)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TIMES)->insert([
                [
                    'idWorkTime' => 1,
                    'rateValue' => 0.1,
                    'staff' => 150.0,
                    'other' => 147.0,
                ],
                [
                    'idWorkTime' => 2,
                    'rateValue' => 0.2,
                    'staff' => 300.0,
                    'other' => 294.0,
                ],
                [
                    'idWorkTime' => 3,
                    'rateValue' => 0.25,
                    'staff' => 375.0,
                    'other' => 367.5,
                ],
                [
                    'idWorkTime' => 4,
                    'rateValue' => 0.3,
                    'staff' => 449.0,
                    'other' => 441.0,
                ],
                [
                    'idWorkTime' => 5,
                    'rateValue' => 0.4,
                    'staff' => 599.9,
                    'other' => 588.0,
                ],
                [
                    'idWorkTime' => 6,
                    'rateValue' => 0.5,
                    'staff' => 749.9,
                    'other' => 735.0,
                ],
                [
                    'idWorkTime' => 7,
                    'rateValue' => 0.6,
                    'staff' => 899.9,
                    'other' => 882.0,
                ],
                [
                    'idWorkTime' => 8,
                    'rateValue' => 0.7,
                    'staff' => 1049.9,
                    'other' => 1029.0,
                ],
                [
                    'idWorkTime' => 9,
                    'rateValue' => 0.8,
                    'staff' => 1199.8,
                    'other' => 1176.0,
                ],
                [
                    'idWorkTime' => 10,
                    'rateValue' => 0.9,
                    'staff' => 1349.8,
                    'other' => 1323.0,
                ],
                [
                    'idWorkTime' => 11,
                    'rateValue' => 1,
                    'staff' => 1499.8,
                    'other' => 1470.0,
                ],
            ]);
        }
    }
}
