<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoorFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poor_family_details', function (Blueprint $table) {
            $table->bigIncrements('id');
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
            $table->string('mother_name')->nullable();
            $table->bigInteger('host_national_id')->nullable();
            $table->bigInteger('mother_national_id')->nullable();
            $table->string('host_relationship')->nullable();
            $table->integer('case_type')->default(0);

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('poor_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poor_family_details');
    }
}
