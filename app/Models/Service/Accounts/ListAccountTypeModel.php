<?php

namespace App\Models\Service\Accounts;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListAccountTypeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_ACCOUNT_TYPE;
    protected $primaryKey = "idAccountType";
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
