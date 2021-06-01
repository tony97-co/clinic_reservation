<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('result')->nullable();
            $table->timestamps();

            $table->increments('interview_id')->unsigned()->index();
            $table->foreign('interview_id')->references('id')->on('interviews');

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
        Schema::dropIfExists('medical_exams');
    }
}
