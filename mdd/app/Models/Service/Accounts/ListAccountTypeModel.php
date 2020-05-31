<?php

namespace App\Models\Service\Accounts;

use Illuminate\Database\Eloquent\Model;

class ListAccountTypeModel extends Model
{
    protected $table = "list_account_type";
    protected $primaryKey = "idAccountType";

    public function getCaption() {
        return $this->caption;
    }

}
