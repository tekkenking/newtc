<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencystaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencystaffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                    ->references('id')
                    ->on('agencies');
            $table->integer('agencystatus_id')->default(1)->comment('Status of this staff');
            $table->foreign('agencystatus_id')
                ->references('id')
                ->on('agencystatuses');
            $table->integer('lga_id')->unsigned();
            $table->foreign('lga_id')
                ->references('id')
                ->on('lgas');
            $table->string('fullname');
            $table->string('alt_phone', 50)->nullable();
            $table->string('address')->nullable();
            $table->string('token', 15);
            $table->boolean('is_admin')->default(0);
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
        Schema::dropIfExists('agencystaffs');
    }
}
