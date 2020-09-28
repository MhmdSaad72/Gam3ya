<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_dates', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->softDeletes();
          $table->string('days')->nullable();
          $table->time('time')->nullable();


          $table->integer('doctor_id')->unsigned()->nullable();
          $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_dates');
    }
}
