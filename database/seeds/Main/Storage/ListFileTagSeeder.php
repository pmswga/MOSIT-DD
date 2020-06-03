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
        DB::table('list_file_tag')->insert([
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::IP,
                'caption' => 'Индивидуальный план',
            ],
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::Order,
                'caption' => 'Приказ',
            ],
            [
                'idFileTag' => \App\Core\Constants\ListFileTagConstants::PROTOCOL,
                'caption' => 'Протокол'
            ]
        ]);
    }
}
