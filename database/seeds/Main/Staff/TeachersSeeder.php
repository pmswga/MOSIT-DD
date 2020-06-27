<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS)->count() === 0) {
            DB::table(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS)->insert(DataSeeder::$teachers);
        }
    }
}
