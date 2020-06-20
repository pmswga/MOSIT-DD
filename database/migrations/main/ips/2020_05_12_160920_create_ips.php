<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_IPS, function (Blueprint $table) {
            $table->bigIncrements('idIP');
            $table->unsignedBigInteger('idTeacher')->index();
            $table->string('educationYear', 9);
            $table->unsignedBigInteger('idEmployeeFile')->index();
            $table->unsignedBigInteger('lastEmployee')->index();
            $table->dateTime('lastUpdate');
            $table->foreign('idTeacher')->references('idTeacher')->on(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idEmployeeFile')->references('idEmployeeFile')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_FILES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lastEmployee')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_IPS);
    }
}
