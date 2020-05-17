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
        DB::table('list_rate_type')->insert([
            [
                'idRateType' => 1,
                'caption' => 'Штатная',
            ],
            [
                'idRateType' => 2,
                'caption' => 'Внутренний совместитель',
            ],
            [
                'idRateType' => 3,
                'caption' => 'Внешний совместитель',
            ]
        ]);
    }
}
