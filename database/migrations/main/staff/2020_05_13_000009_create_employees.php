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
            $table->string("secondName");
            $table->string("firstName");
            $table->string("patronymic")->nullable();
            $table->string('personalPhone', 12);
            $table->string('personalEmail')->nullable();
            $table->unsignedBigInteger('idFaculty')->index();
            $table->unsignedBigInteger('idEmployeePost')->index();
            $table->foreign('idFaculty')->references('idFaculty')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FACULTY)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idEmployeePost')->references('idEmployeePost')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_EMPLOYEE_POST)
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
