<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Employees')->insert(DataSeeder::$employees);
    }
}
