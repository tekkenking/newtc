<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyGovernorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_governor', function (Blueprint $table) {
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies');

            $table->integer('governor_id')->unsigned();
            $table->foreign('governor_id')
                ->references('id')
                ->on('governors');

            $table->boolean('active')->comment('active: 1 or 0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_governor');
    }
}
