<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_flat', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->integer('flat_id')->unsigned();
            $table->string('accountid')->unique();
            $table->decimal('agency_balance',19,2)->default(0.00);
            $table->integer('is_linked')->default(1)->comment('This field determined the linking and unlinking of customer and flat. 1: means linked, 0: means unlinked');
            $table->string('status', 20)->default('active')->comment('status:active, suspended, terminated');
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
        Schema::dropIfExists('agency_flat');
    }
}
