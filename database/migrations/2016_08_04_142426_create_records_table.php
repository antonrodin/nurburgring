<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('driver_id')->unsigned()->index();
            $table->integer('track_id')->unsigned()->index();
            $table->integer('car_id')->unsigned()->index();
            $table->string('slug')->unique();
            $table->date('record_date');
            $table->integer('total')->unsigned();
            $table->integer('min')->unsigned();
            $table->integer('seg')->unsigned();
            $table->integer('miliseg')->unsigned();

            $table->longtext('en_description');
            $table->longtext('es_description');
            $table->longtext('ru_description');

            $table->string('youtube');
            $table->string('url');
            $table->timestamps();

            //Claves foraneas
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('records');
    }
}
