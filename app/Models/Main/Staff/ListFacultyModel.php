<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListFacultyModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_FACULTY;
    protected $primaryKey = 'idFaculty';

    public function getCaption() {
        return $this->caption;
    }

    public function getInstitute() {
        return $this->hasOne(ListInstituteModel::class, 'idInstitute', 'idInstitute')->first();
    }

}
