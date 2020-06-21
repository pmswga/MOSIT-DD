<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_STATUS)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_STATUS)->insert([
                [
                    'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::OPENED,
                    'caption' => 'Открыто'
                ],
                [
                    'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::PROGRESS,
                    'caption' => 'В процессе'
                ],
                [
                    'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::CLOSED,
                    'caption' => 'Закрыто (Исполнено)'
                ]
            ]);
        }
    }
}
