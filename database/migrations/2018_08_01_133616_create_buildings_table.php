<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lga_id')->unsigned();
            $table->foreign('lga_id')
                    ->references('id')
                    ->on('lgas');
            $table->integer('buildingstatus_id')->unsigned();
            $table->foreign('buildingstatus_id')
                    ->references('id')
                    ->on('buildingstatuses');
            $table->integer('buildingtype_id')->unsigned();
            $table->foreign('buildingtype_id')
                    ->references('id')
                    ->on('buildingtypes');
            $table->integer('buildingmode_id')->unsigned();
            $table->foreign('buildingmode_id')
                    ->references('id')
                    ->on('buildingmodes');
            $table->integer('buildingstructure_id')->unsigned();
            $table->foreign('buildingstructure_id')
                    ->references('id')
                    ->on('buildingstructures');
            $table->integer('estate_id')->unsigned()->nullable();
            $table->foreign('estate_id')
                ->references('id')
                ->on('estates');

            $table->decimal('lng', 11, 8)->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->string('address');
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
        Schema::dropIfExists('buildings');
    }
}
