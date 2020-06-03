<?php

namespace App\Models\Main\Storage;

use Illuminate\Database\Eloquent\Model;

class ListFileTagModel extends Model
{
    protected $table = 'list_file_tag';
    protected $primaryKey = 'idFileTag';

    public function getCaption() {
        return $this->caption;
    }

}
