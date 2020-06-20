<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_TICKET_FILES, function (Blueprint $table) {
            $table->bigIncrements('idTicketFile');
            $table->unsignedBigInteger('idEmployee')->index();
            $table->unsignedBigInteger('idTicket')->index();
            $table->string('path');
            $table->string('filename');
            $table->string('extension');
            $table->timestamps();
            $table->foreign('idEmployee')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idTicket')->references('idTicket')->on(\App\Core\Config\ListDatabaseTable::TABLE_TICKETS)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_TICKET_FILES);
    }
}
