<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountRights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_rights', function (Blueprint $table) {
            $table->integer('idAccount');
            $table->integer('idSubSystem');
            $table->boolean('isAccess')->default(0);
            $table->boolean('isViewAny')->default(0);
            $table->boolean('isView')->default(0);
            $table->boolean('isCreate')->default(0);
            $table->boolean('isUpdate')->default(0);
            $table->boolean('isDelete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_rights');
    }
}
