<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencybillingarrearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * This is for agencies that don't scanned before billing customers.
         * e.g, tenantment rates
         */
        Schema::create('agencybillingarrears', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flat_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('agencybilling_id')->unsigned();
            $table->integer('agency_id')->unsigned();
            $table->string('transaction_ref')->nullable();
            $table->decimal('amount',19,2)->default(0.00);
            $table->decimal('discounted_amount',19,2)->default(0.00);
            $table->dateTime('paid_date')->nullable()->comment('if null, it means not yet paid, else date and time of pay');
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
        Schema::dropIfExists('agencybillingarrears');
    }
}
