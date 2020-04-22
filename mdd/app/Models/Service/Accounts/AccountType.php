<?php

namespace App\Models\Service\Accounts;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = "AccountType";
    protected $primaryKey = "idAccountType";

    public function getAccountTypeId() {
        return $this->idAccountType;
    }

    public function getCaption() {
        return $this->caption;
    }

}
