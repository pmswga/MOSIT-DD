<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_tickets', function (Blueprint $table) {
            $table->bigIncrements('idEmployeeTicket');
            $table->integer('idEmployee');
            $table->integer('idTicket');
            $table->boolean('isSeen')->default(False);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_tickets');
    }
}
