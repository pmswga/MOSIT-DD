<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListSystemSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_system_section')->insert([
            [
                'idSystemSection' => 1,
                'caption' => 'Учебная работа'
            ],
            [
                'idSystemSection' => 2,
                'caption' => 'Научная работа'
            ],
            [
                'idSystemSection' => 3,
                'caption' => 'Учебно-методическая работа'
            ],
            [
                'idSystemSection' => 4,
                'caption' => 'МТО'
            ],
            [
                'idSystemSection' => 5,
                'caption' => 'Работа со студентами'
            ],
            [
                'idSystemSection' => 6,
                'caption' => 'Общие'
            ]
        ]);
    }
}
