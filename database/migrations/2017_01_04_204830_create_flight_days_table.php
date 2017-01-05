<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_days', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("flight_id")->unsigned();
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');

            $table->string('day');

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
        Schema::dropIfExists('flight_days');
    }
}
