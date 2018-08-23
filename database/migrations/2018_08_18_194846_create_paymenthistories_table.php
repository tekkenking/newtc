<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymenthistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Paymenthistories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flat_id')->unsigned();
            $table->foreign('flat_id')
                ->references('id')
                ->on('flats');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->integer('paymenttype_id')->unsigned();
            $table->foreign('paymenttype_id')
                ->references('id')
                ->on('paymenttypes');
            $table->string('transaction_ref')->nullable();
            $table->decimal('amount',19,2)->default(0.00);
            $table->boolean('status')->comment('status is either 1:success | 0:fail');
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
        Schema::dropIfExists('Paymenthistories');
    }
}
