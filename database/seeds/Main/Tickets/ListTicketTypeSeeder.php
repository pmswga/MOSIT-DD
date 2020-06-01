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
        DB::table('list_ticket_type')->insert([
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
