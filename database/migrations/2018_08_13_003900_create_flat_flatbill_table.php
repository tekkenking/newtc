<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatFlatbillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_flatbill', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('flat_id')->unsigned();
            $table->integer('flatbill_id')->unsigned();
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
        Schema::dropIfExists('flat_flatbill');
    }
}
