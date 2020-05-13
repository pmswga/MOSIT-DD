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
                'route' => 'ips.index'
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Приказы',
                'route' => 'orders.index',
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Протоколы',
                'route' => 'protocols.index'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Хранение материалов',
                'route' => 'files.index'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Поручения',
                'route' => 'tickets.index'
            ]
        ]);
    }
}
