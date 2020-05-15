<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsRights extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts_rights')->insert(DataSeeder::$accountRights);
    }
}
