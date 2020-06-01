<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_account_type')->insert([
            [
                'idAccountType' => 1,
                'caption' => 'Преподаватель'
            ],
            [
                'idAccountType' => 2,
                'caption' => 'Методист'
            ],
            [
                'idAccountType' => 3,
                'caption' => 'Зам. по учебной работе'
            ],
            [
                'idAccountType' => 4,
                'caption' => 'Зам. по научной работе'
            ],
            [
                'idAccountType' => 5,
                'caption' => 'Зам. по учебно-методической работе'
            ],
            [
                'idAccountType' => 6,
                'caption' => 'Отвественный за МТО'
            ],
            [
                'idAccountType' => 7,
                'caption' => 'Ответственный за работу со студентами'
            ],
            [
                'idAccountType' => 8,
                'caption' => 'Учёный секретарь'
            ],
            [
                'idAccountType' => 9,
                'caption' => 'Зав. кафедрой'
            ],
            [
                'idAccountType' => 10,
                'caption' => 'Администратор'
            ]
        ]);
    }
}
