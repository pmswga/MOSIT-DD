<?php

namespace App\Models\Main\Employees;

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

    public function getPatronymic() {
        return $this->patronymic;
    }

    public function getAccountId() {
        return $this->idEmployee;
    }

}
