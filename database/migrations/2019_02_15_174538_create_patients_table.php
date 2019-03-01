<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('patients', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->integer('doctor_id')->unsigned();
            $table->string('first_name',50);
            $table->string('last_name',50)->nullable();
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender',20);
            $table->string('mobile',30)->nullable();
            $table->string('blood_type',15)->nullable();
            $table->text('family_history')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('post_surgical_history')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            // $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('doctor_id')->references('id')->on('users')->onDelete('restrict');
            // $table->foreign("created_by")->references('id')->on('users')->onDelete('restrict');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
