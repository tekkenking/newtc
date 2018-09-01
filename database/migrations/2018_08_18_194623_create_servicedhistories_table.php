<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicedhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicedhistories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies');
            $table->integer('agencystaff_id')->unsigned();
            $table->foreign('agencystaff_id')
                ->references('id')
                ->on('agencystaffs');
            $table->integer('flat_id')->unsigned();
            $table->foreign('flat_id')
                ->references('id')
                ->on('flats');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->integer('barcode_id')->unsigned();
            $table->foreign('barcode_id')
                ->references('id')
                ->on('barcodes');
            $table->integer('servicestatus_id')->unsigned();
            $table->foreign('servicestatus_id')
                ->references('id')
                ->on('servicestatuses');
            $table->decimal('amount',19,2)->default(0.00);
            $table->decimal('lng', 11, 8)->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            //$table->timestamp('nextchargedate')->nullable();
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
        Schema::dropIfExists('servicedhistories');
    }
}
