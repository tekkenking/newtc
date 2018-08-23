<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencystafftemploginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencystafftemplogins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agencystaff_id')->unsigned();
            $table->foreign('agencystaff_id')
                ->references('id')
                ->on('agencystaffs');
            $table->string('passkey');
            $table->string('note');
            $table->dateTime('expired_at');
            $table->boolean('is_revoked')->default(0)->comment('options: 0: false, 1: true');
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
        Schema::dropIfExists('agencystafftemplogins');
    }
}
