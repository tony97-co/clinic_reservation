<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_clinics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->increments('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->increments('clinic_id')->unsigned()->index();
            $table->foreign('clinic_id')->references('id')->on('clinics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_clinics');
    }
}
