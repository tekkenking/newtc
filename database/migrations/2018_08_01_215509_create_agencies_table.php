<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agencystatus_id')->default(1);
            $table->foreign('agencystatus_id')
                ->references('id')
                ->on('agencystatuses');
            $table->integer('agencycategory_id')->unsigned();
            $table->foreign('agencycategory_id')
                ->references('id')
                ->on('agencycategories');
            $table->integer('agencymode_id')->unsigned();
            $table->foreign('agencymode_id')
                ->references('id')
                ->on('agencymodes');
            $table->integer('lga_id')->unsigned();
            $table->foreign('lga_id')
                    ->references('id')
                    ->on('lgas');
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')
                ->references('id')
                ->on('banks');
            $table->integer('tcstaff_id')->unsigned();
            $table->foreign('tcstaff_id')
                    ->references('id')
                    ->on('tcstaff');
            $table->string('name');
            $table->string('email', 100)->nullable();
            $table->string('phone', 20);
            $table->string('alt_phone', 20)->nullable();
            $table->string('address');
            $table->string('token', 15);
            $table->string('bank_account_number', 20);
            $table->string('bank_account_name', 100);
            $table->string('bank_bvn',20);
            $table->string('description')->nullable();
            //$table->boolean('is_scanning_agent')->comment('Is this an agent that scan before serving the flat? 1:true or 0:false');
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
        Schema::dropIfExists('agencies');
    }
}
