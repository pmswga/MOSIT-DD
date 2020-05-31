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
        DB::table('list_ticket_status')->insert([
            [
                'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::CREATE,
                'caption' => 'Создано'
            ],
            [
                'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::PROGRESS,
                'caption' => 'В процессе'
            ],
            [
                'idTicketStatus' => \App\Core\Constants\ListTicketStatusConstants::FINISH,
                'caption' => 'Исполнено'
            ]
        ]);
    }
}
