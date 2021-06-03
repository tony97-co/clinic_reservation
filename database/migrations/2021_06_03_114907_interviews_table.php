<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->enum('state',['finished','notstarted','pending'])->default('notstarted');

        $table->unsignedInteger('doctor_id');
        $table->foreign('doctor_id')->references('id')->on('doctors');

        $table->unsignedInteger('patient_id');
        $table->foreign('patient_id')->references('id')->on('patients');
    });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
