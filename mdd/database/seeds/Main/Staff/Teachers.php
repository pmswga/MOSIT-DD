<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Teachers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Teachers')->insert([
            [
                'idTeacher' => 1,
                'idEmployee' => 0,
                'idDegree' => 0,
                'idAcademicTitle' => 0,
                'idScienceType' => 0,
                'idTeacherPost' => 0
            ]
        ]);
    }
}
