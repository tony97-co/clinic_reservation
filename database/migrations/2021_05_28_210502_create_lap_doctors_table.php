<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lap_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');

            $table->$table->increments('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->$table->increments('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->$table->increments('clinic_id')->unsigned()->index();
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
        Schema::dropIfExists('lap-doctors');
    }
}
