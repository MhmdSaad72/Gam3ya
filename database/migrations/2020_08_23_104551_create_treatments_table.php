<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('serial_number')->nullable();
            $table->string('prescription_number')->nullable();
            $table->string('teller_name')->nullable();
            $table->date('exchange_date')->nullable();
            $table->string('national_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount')->nullable();
            $table->text('reason')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('treatments');
    }
}
