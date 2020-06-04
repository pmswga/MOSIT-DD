<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES, function (Blueprint $table) {
            $table->bigIncrements('idEmployee');
            $table->string("secondName", 255);
            $table->string("firstName", 255);
            $table->string("patronymic", 255)->nullable();
            $table->string('personalPhone', 12);
            $table->string('personalEmail', 255)->nullable();
            $table->integer('idFaculty');
            $table->integer('idEmployeePost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES);
    }
}
