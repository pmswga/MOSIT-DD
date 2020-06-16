<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListWorkType extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORK_TYPE;
    protected $primaryKey = 'idWorkType';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
