<?php

namespace App\Models\Service\Accounts;

use App\Models\Service\Lists\ListSubSystemModel;
use Illuminate\Database\Eloquent\Model;

class AccountRightsModel extends Model
{
    protected $table = 'account_rights';
    protected $primaryKey = 'idAccountRight';
    public $timestamps = false;

    public function getSubSystem() {
        return $this->hasOne(ListSubSystemModel::class, 'idSubSystem', 'idSubSystem')->first();
    }

    public function isAccess() {
        return $this->isAccess;
    }

    public function isViewAny() {
        return $this->isViewAny;
    }

    public function isView() {
        return $this->isView;
    }

    public function isCreate() {
        return $this->isCreate;
    }

    public function isUpdate() {
        return $this->isUpdate;
    }

    public function isDelete() {
        return $this->isDelete;
    }

}
