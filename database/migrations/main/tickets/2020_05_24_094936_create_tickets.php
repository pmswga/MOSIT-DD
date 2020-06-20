<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_TICKETS, function (Blueprint $table) {
            $table->bigIncrements('idTicket');
            $table->unsignedBigInteger('idAuthor')->index();
            $table->unsignedBigInteger('idTicketType')->index();
            $table->unsignedBigInteger('idTicketStatus')->index();
            $table->string('caption');
            $table->text('description');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->timestamps();
            $table->foreign('idAuthor')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idTicketType')->references('idTicketType')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_TYPE)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idTicketStatus')->references('idTicketStatus')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_STATUS)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_TICKETS);
    }
}
