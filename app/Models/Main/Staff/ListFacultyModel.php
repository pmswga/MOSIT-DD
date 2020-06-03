<?php

namespace App\Models\Main\Staff;

use Illuminate\Database\Eloquent\Model;

class ListFacultyModel extends Model
{
    protected $table = 'list_faculty';
    protected $primaryKey = 'idFaculty';

    public function getCaption() {
        return $this->caption;
    }

    public function getInstitute() {
        return $this->hasOne(ListInstituteModel::class, 'idInstitute', 'idInstitute')->first();
    }

}
