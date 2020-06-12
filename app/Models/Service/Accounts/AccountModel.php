<?php

namespace App;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListSubSystemConstants;
use App\Models\Service\Accounts\AccountRightsModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AccountModel extends Authenticatable
{
    use Notifiable;

    protected $table = ListDatabaseTable::TABLE_ACCOUNTS;
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
        return $this->hasOne('App\Models\Main\Staff\EmployeeModel', 'idEmployee', 'idEmployee')->first();
    }

    public function getAccountType() {
        return $this->hasOne('App\Models\Service\Accounts\ListAccountTypeModel', 'idAccountType', 'idAccountType')->first();
    }

    public function getIdAccountType() {
        return $this->idAccountType;
    }

    public function getAccountRights() {
        $rights = $this->hasMany(AccountRightsModel::class, 'idAccount', 'idAccount')
            ->where('isAccess', '=', 1)
            ->whereNotIn('idSubSystem', [
                ListSubSystemConstants::Storage,
                ListSubSystemConstants::Tickets
            ])
            ->get();

        $groupRights = [];
        foreach ($rights as $right) {
            $groupRights[$right->getSubSystem()->getSystemSection()->getCaption()][] = $right;
        }

        return $groupRights;
    }

    public function getAccountRightsOn(int $systemId) {
        $accountRight =  $this->hasOne(AccountRightsModel::class, 'idAccount', 'idAccount')
            ->where('idSubSystem', '=', $systemId)
            ->first();

        if ($accountRight) {
            return $accountRight;
        }

        return new AccountRightsModel();
    }

}
