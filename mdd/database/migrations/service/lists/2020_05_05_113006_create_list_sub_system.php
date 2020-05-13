<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSubSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_sub_system', function (Blueprint $table) {
            $table->bigIncrements('idSubSystem');
            $table->integer('idSystemSection');
            $table->string('caption', 255)->unique();
            $table->string('route', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ListSubSystem');
    }
}
