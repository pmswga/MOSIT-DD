<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListAcademicTitle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_academic_title')->insert([
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
