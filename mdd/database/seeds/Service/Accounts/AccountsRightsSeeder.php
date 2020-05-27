<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsRightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountRights = [];

        foreach (DataSeeder::$employees as $employee) {
            $accountRights[] = [
                'idAccount' => $employee['idEmployee'],
                'idSubSystem' => \App\Core\Constants\ListSubSystem::Tickets,
                'isAccess' => True,
                'isViewAny' => True,
                'isView' => True,
                'isCreate' => True,
                'isUpdate' => True,
                'isDelete' => True
            ];
            $accountRights[] = [
                'idAccount' => $employee['idEmployee'],
                'idSubSystem' => \App\Core\Constants\ListSubSystem::Storage,
                'isAccess' => True,
                'isViewAny' => True,
                'isView' => True,
                'isCreate' => True,
                'isUpdate' => True,
                'isDelete' => True
            ];
        }

        $accountRights[] = [
            'idAccount' => DataSeeder::$employees[0]['idEmployee'],
            'idSubSystem' => \App\Core\Constants\ListSubSystem::IPS,
            'isAccess' => True,
            'isViewAny' => True,
            'isView' => True,
            'isCreate' => True,
            'isUpdate' => True,
            'isDelete' => True
        ];

        DB::table('accounts_rights')->insert($accountRights);
    }
}
