<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('doctor_id');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('cancel_id');
            $table->integer('appointment_time');
            $table->integer('duration');
            $table->timestamps();
            // $table->foreign('doctor_id')->references('id')->on('users');
            // $table->foreign('patient_id')->references('id')->on('users');
            // $table->foreign('cancel_id')->references('id')->on('cancellations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
    }
}
