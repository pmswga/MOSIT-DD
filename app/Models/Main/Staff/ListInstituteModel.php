<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListInstituteModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_INSTITUTE;
    protected $primaryKey = 'idInstitute';

    public function getCaption() {
        return $this->caption;
    }

}
