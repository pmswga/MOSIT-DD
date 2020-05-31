<?php

namespace App\Models\Service\Accounts;

use Illuminate\Database\Eloquent\Model;

class ListSystemSectionModel extends Model
{
    protected $table = 'list_system_section';
    protected $primaryKey = 'idSystemSection';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
