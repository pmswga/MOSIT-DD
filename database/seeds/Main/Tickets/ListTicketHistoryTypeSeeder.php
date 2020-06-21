<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTicketHistoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_HISTORY_TYPE)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_HISTORY_TYPE)->insert([
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::CREATE,
                    'caption' => 'Создание',
                    'message' => 'создал(а) поручение'
                ],
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::COMMENT,
                    'caption' => 'Комментирование',
                    'message' => 'прокомментировал(а) поручение'
                ],
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::ATTACH_FILE,
                    'caption' => 'Прикрепление файла',
                    'message' => 'прикрепил(а) файл(ы)'
                ],
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::DELETE,
                    'caption' => 'Удаление',
                    'message' => 'удалил(а) поручение'
                ],
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::CLOSE,
                    'caption' => 'Закрытие',
                    'message' => 'закрыл(а) поручение'
                ],
                [
                    'idTicketHistoryType' => \App\Core\Constants\ListTicketHistoryTypeConstants::COMPLETE,
                    'caption' => 'Выполненно',
                    'message' => 'выполнил(а) поручение'
                ],
            ]);
        }
    }
}
