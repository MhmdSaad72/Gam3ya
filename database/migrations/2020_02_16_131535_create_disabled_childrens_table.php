<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabledChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabled_childrens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->date('birth_date')->nullable();
            $table->bigInteger('national_id')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('social_status')->default(0);
            $table->integer('type')->default(0);


            $table->bigInteger('family_id')->unsigned()->nullable();
            $table->foreign('family_id')->references('id')->on('disabled_family_details')->onDelete('cascade');

            $table->bigInteger('orphan_sponser_id')->unsigned()->nullable();
            $table->foreign('orphan_sponser_id')->references('id')->on('disabled_orphan_sponsers')->onDelete('cascade');

            $table->bigInteger('disabled_id')->unsigned()->nullable();
            $table->foreign('disabled_id')->references('id')->on('disableds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disabled_childrens');
    }
}
