<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNurseryChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurseyr_childrens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->date('birth_date')->nullable();
            $table->bigInteger('national_id')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('social_status')->default(0);
            $table->integer('type')->default(0);

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nurseyr_childrens');
    }
}
