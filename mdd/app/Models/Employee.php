<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "Employees";
    protected $primaryKey = "idEmployee";

    public function getSecondName() {
        return $this->secondName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getAccountId() {
        return $this->idEmployee;
    }

}
