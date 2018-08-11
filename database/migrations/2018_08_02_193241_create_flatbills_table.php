<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flatbills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies');
            $table->integer('agencystatus_id')->unsigned();
            $table->foreign('agencystatus_id')
                ->references('id')
                ->on('agencystatuses');
            $table->string('name');
            $table->decimal('amount',19,2)->default(0.00);
            $table->decimal('pending_amount',19,2)->default(0.00);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('flatbills');
    }
}
