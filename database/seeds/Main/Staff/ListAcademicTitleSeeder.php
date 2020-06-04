<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListAcademicTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_ACADEMIC_TITLE)->insert([
            [
                'idAcademicTitle' => 1,
                'caption' => 'Доцент'
            ],
            [
                'idAcademicTitle' => 2,
                'caption' => 'Профессор'
            ],
        ]);
    }
}
