<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userstatus_id')->unsigned()->default(1);
            $table->foreign('userstatus_id')
                ->references('id')
                ->on('userstatuses');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')
                ->references('id')
                ->on('genders');
            $table->string('profile_type');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('can_login')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}