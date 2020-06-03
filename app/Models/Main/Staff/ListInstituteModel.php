<?php

namespace App\Models\Main\Staff;

use Illuminate\Database\Eloquent\Model;

class ListInstituteModel extends Model
{
    protected $table = 'list_institute';
    protected $primaryKey = 'idInstitute';

    public function getCaption() {
        return $this->caption;
    }

}
