<?php

namespace App;

use App\Core\Constants\ListSubSystem;
use App\Models\Main\Employees\EmployeeModel;
use App\Models\Service\Accounts\AccountType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "Accounts";
    protected $primaryKey = "idAccount";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'idEmployee', 'idAccountType'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getEmail() {
        return $this->email;
    }

    public function getEmployee() {
        return $this->hasOne('App\Models\Main\Employees\EmployeeModel', 'idEmployee', 'idEmployee')->first();
    }

    public function getAccountType() {
        return $this->hasOne('App\Models\Service\Accounts\AccountType', 'idAccountType', 'idAccountType')->first()["caption"];
    }

    public function getIdAccountType() {
        return $this->idAccountType;
    }

    public function getAccountRights() {
        $rights = DB::table('accounts_rights')
            ->select('accounts_rights.idAccount', 'list_sub_system.caption', 'list_system_section.caption as section', 'list_sub_system.route')
            ->join('list_sub_system', 'accounts_rights.idSubSystem', '=', 'list_sub_system.idSubSystem')
            ->join('list_system_section', 'list_system_section.idSystemSection', '=', 'list_sub_system.idSystemSection')
            ->where('idAccount', '=', $this->idAccount)
            ->where( 'isAccess', '=', 1)
            ->get();

        $groupRights = [];

        foreach ($rights as $right) {
            $groupRights[$right->section][] = $right;
        }

        return $groupRights;
    }

    public function isAccessOn(int $systemId) {
        $result = DB::table('accounts_rights')
            ->select('accounts_rights.isAccess')
            ->where('idAccount', '=', $this->idAccount)
            ->where('idSubSystem', '=', $systemId)
            ->get()->first();

        if ($result) {
            return $result->isAccess;
        }

        return false;
    }

    public function getAccountRightsBy($system) {
        return DB::table('accounts_rights')
            ->where('idAccount', '=', $this->idAccount)
            ->where('idSubSystem', '=', $system)
            ->get()->first();
    }

}
