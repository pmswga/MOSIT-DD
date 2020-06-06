<?php

namespace App\Models\Service\Accounts;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListSystemSectionModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_SYSTEM_SECTION;
    protected $primaryKey = 'idSystemSection';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
