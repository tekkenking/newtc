<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            /**
             * options json { balancefloatable:true|false }
            - If balancefloatable is true: it means only charge from my agency balance
            - If it's false: it means charge from my agency balance and if no or not enought balance, then check to charge from my master balance, before responding with no balance
            */
            $table->json('options')->comment('JSON CONFIG. eg. alert:true');
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
        Schema::dropIfExists('customerconfigs');
    }
}
