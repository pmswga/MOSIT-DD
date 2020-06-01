<?php

namespace App\Models\Service\Lists;

use Illuminate\Database\Eloquent\Model;

class ListEmployeePostModel extends Model
{
    protected $table = 'list_employee_post';
    protected $primaryKey = 'idEmployeePost';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }


}
