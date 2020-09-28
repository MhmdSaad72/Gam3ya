<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('care_number')->nullable();
            $table->integer('serial_number')->nullable();
            $table->string('father_name')->nullable();
            $table->bigInteger('father_national_id')->nullable();
            $table->string('host_name')->nullable();
            $table->string('host_image')->nullable();
            $table->bigInteger('host_national_id')->nullable();
            $table->string('host_relationship')->nullable();

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('family_details');
    }
}
