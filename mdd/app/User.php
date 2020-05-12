<?php

namespace App;

use App\Models\Main\Employees\Employee;
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
        return $this->hasOne('App\Models\Main\Employees\Employee', 'idEmployee', 'idEmployee')->first();
    }

    public function getAccountType() {
        return $this->hasOne('App\Models\Service\Accounts\AccountType', 'idAccountType', 'idAccountType')->first()["caption"];
    }

    public function getIdAccountType() {
        return $this->idAccountType;
    }

    public function getAccountRights() {
        $rights = DB::table('AccountRights')
            ->select('AccountRights.idAccount', 'ListSubSystem.caption', 'ListSystemSection.caption as section', 'ListSubSystem.route')
            ->join('ListSubSystem', 'AccountRights.idSubSystem', '=', 'ListSubSystem.idSubSystem')
            ->join('ListSystemSection', 'ListSystemSection.idSystemSection', '=', 'ListSubSystem.idSystemSection')
            ->where('idAccount', '=', $this->idAccount)
            ->where( 'isAccess', '=', 1)
            ->get();

        $groupRights = [];

        foreach ($rights as $right) {
            $groupRights[$right->section][] = $right;
        }

        return $groupRights;
    }

}
