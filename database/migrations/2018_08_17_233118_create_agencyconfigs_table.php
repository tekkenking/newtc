<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencyconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies');

            /**
             * Tcstaff to set some configuation for this agency
             * tcagency json {
             * servicecomment: trash pickup, showcustomeraddress:true|false,
             * showcustomeremail:true|false, showcustomerphone:true|false,
             * showcustomerpaymenthistory:true|false,
             * showcustomerphonenumber:true,
             * showcustomeraddress:true
             * }
             */
            $table->json('tcagencyoptions');

            /**
             * Agency set config:
             * agency json {
             * servicechargedays: 28,
             * daysbeforegeneratebill: 21
             * immediatecharge: true|false
             * }
             */
            $table->json('agencyoptions');
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
        Schema::dropIfExists('agencyconfigs');
    }
}
