<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('clinic_id');
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('doctor_id');
            $table->dateTime('date_time');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('speciality_id')->references('id')->on('specialities');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
