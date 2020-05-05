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
        DB::table('ListSubSystem')->insert([
            [
                'idSystemSection' => 1,
                'caption' => 'Индивидуальные планы'
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Приказы'
            ],
            [
                'idSystemSection' => 1,
                'caption' => 'Протоколы'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Хранение материалов'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Поручения'
            ]
        ]);
    }
}
