<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_flat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('flat_id')->unsigned();
            $table->integer('is_linked')->default(1)->comment('This field determined the linking and unlinking of customer and flat. 1: means linked, 0: means unlinked');
            $table->timestamp('unlinked_date')->nullable()->comment('Date and time the unlinking happened');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_flat');
    }
}
