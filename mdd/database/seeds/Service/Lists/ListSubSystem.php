<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListSubSystem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_sub_system')->insert([
            [
                'idSystemSection' => 1,
                'caption' => 'Индивидуальные планы',
                'route' => 'ips'
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Приказы',
                'route' => 'orders',
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Протоколы',
                'route' => 'protocols'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Хранение материалов',
                'route' => 'files'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Поручения',
                'route' => 'tickets'
            ]
        ]);
    }
}
