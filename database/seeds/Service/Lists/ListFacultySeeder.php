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
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SYSTEM_SECTION)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SYSTEM_SECTION)->insert([
                [
                    'idFaculty' => 1,
                    'idInstitute' => 1,
                    'caption' => 'МОСИТ'
                ],
            ]);
        }
    }
}
