<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
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

            $table->increments('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->increments('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->enum('state',['finished','notstarted','pending'])->default('notstarted');
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
        Schema::dropIfExists('interviews');
    }
}
