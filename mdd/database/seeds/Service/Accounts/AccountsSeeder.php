<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [];

        foreach (DataSeeder::$employees as $employee) {
            $accounts[] = [
                'idAccount' => $employee['idEmployee'],
                'idEmployee' => $employee['idEmployee'],
                'idAccountType' => $employee['idEmployeePost'],
                'email' => $employee['personalEmail'],
                'email_verified_at' => NULL,
                'password' => \Illuminate\Support\Facades\Hash::make('qwerty'),
                'remember_token' => NULL,
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01'
            ];
        }

        DB::table('AccountsSeeder')->insert($accounts);
    }
}
