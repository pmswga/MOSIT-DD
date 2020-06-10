<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FACULTY)->insert([
            [
                'idFaculty' => 1,
                'idInstitute' => 1,
                'caption' => 'МОСИТ'
            ],
            [
                'idFaculty' => 2,
                'idInstitute' => 1,
                'caption' => 'КИС'
            ],
            [
                'idFaculty' => 3,
                'idInstitute' => 1,
                'caption' => 'ИППО'
            ],
        ]);
    }
}
