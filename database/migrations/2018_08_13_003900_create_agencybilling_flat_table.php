<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencybillingFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencybilling_flat', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('agencybilling_id')->unsigned();
            $table->integer('flat_id')->unsigned();
            $table->integer('agent_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencybilling_flat');
    }
}
