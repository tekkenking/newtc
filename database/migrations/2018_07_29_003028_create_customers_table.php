<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customertype_id')->unsigned();
            $table->foreign('customertype_id')
                ->references('id')
                ->on('customertypes');
            $table->string('fullname');
            $table->string('alt_phone')->nullable();
            /**
             * options json { balancefloatable:true|false }
            - If balancefloatable is true: it means only charge from my agency balance
            - If it's false: it means charge from my agency balance and if no or not enought balance, then check to charge from my master balance, before responding with no balance
             */
            $table->json('configs')->comment('JSON CONFIG. eg. alert:true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
