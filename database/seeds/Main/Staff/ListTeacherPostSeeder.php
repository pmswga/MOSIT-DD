<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTeacherPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TEACHER_POST)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TEACHER_POST)->insert([
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::ASSISTANT,
                    'caption' => 'Ассистент'
                ],
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::TEACHER,
                    'caption' => 'Преподаватель'
                ],
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HIGHER_TEACHER,
                    'caption' => 'Старший преподаватель'
                ],
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::DOCENT,
                    'caption' => 'Доцент'
                ],
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::PROFESSOR,
                    'caption' => 'Профессор'
                ],
                [
                    'idTeacherPost' => \App\Core\Constants\ListTeacherPostConstants::HEAD_DEPARTMENT,
                    'caption' => 'Зав. кафедрой'
                ]
            ]);
        }
    }
}
