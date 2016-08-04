<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('circuit_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->string('slug')->unique();
            $table->date('record_date');
            $table->integer('total')->unsigned();
            $table->longtext('description');
            $table->string('youtube');
            $table->string('url');
            $table->timestamps();

            //Claves foraneas
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('circuit_id')->references('id')->on('circuits');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tiempos');
    }
}
