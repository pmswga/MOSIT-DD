<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTeacherPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_teacher_post')->insert([
            [
                'idTeacherPost' => 1,
                'caption' => 'Ассистент'
            ],
            [
                'idTeacherPost' => 2,
                'caption' => 'Преподаватель'
            ],
            [
                'idTeacherPost' => 3,
                'caption' => 'Старший преподаватель'
            ],
            [
                'idTeacherPost' => 4,
                'caption' => 'Доцент'
            ],
            [
                'idTeacherPost' => 5,
                'caption' => 'Профессор'
            ],
        ]);
    }
}
