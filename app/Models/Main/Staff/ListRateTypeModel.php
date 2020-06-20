<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListRateTypeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_RATE_TYPE;
    protected $primaryKey = 'idRateType';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
