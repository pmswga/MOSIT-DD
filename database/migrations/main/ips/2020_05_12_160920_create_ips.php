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
            $table->integer('idTeacher');
            $table->string('educationYear', 9);
            $table->integer('idEmployeeFile');
            $table->integer('lastEmployee');
            $table->dateTime('lastUpdate');
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
