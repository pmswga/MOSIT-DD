<?php

namespace App\Models\Main\IP;

use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    protected $table = 'ips';
    protected $primaryKey = 'idIP';
    public $timestamps = false;

}
