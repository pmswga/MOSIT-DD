<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListTicketStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_STATUS, function (Blueprint $table) {
            $table->bigIncrements('idTicketStatus');
            $table->string('caption')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TICKET_STATUS);
    }
}
