<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Accounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Accounts')->insert([
            [
                'idAccount' => 1,
                'idEmployee' => 1,
                'idAccountType' => 2,
                'email' => 'eudgin@mail.ru',
                'email_verified_at' => NULL,
                'password' => \Illuminate\Support\Facades\Hash::make('qwerty'),
                'remember_token' => NULL,
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01'
            ],
            [
                'idAccount' => 2,
                'idEmployee' => 2,
                'idAccountType' => 2,
                'email' => 'stepa@mail.ru',
                'email_verified_at' => NULL,
                'password' => \Illuminate\Support\Facades\Hash::make('qwerty'),
                'remember_token' => NULL,
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01'
            ],
            [
                'idAccount' => 3,
                'idEmployee' => 3,
                'idAccountType' => 2,
                'email' => 'ivshin@mail.ru',
                'email_verified_at' => NULL,
                'password' => \Illuminate\Support\Facades\Hash::make('qwerty'),
                'remember_token' => NULL,
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01'
            ],
        ]);
    }
}
