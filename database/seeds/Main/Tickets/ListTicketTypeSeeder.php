<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_TYPE)->insert([
            [
                'idTicketType' => \App\Core\Constants\ListTicketTypeConstants::TASK,
                'caption' => 'Задача'
            ],
            [
                'idTicketType' => \App\Core\Constants\ListTicketTypeConstants::MEETING,
                'caption' => 'Встреча'
            ]
        ]);
    }
}
