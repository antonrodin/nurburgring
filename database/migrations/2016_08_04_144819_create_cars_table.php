<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('image_id')->unsigned()->index();
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('model');

            $table->longtext('en_description');
            $table->longtext('es_description');
            $table->longtext('ru_description');

            //Car Specs
            $table->string('type');
            $table->string('power');
            $table->string('weight');
            $table->string('torque');
            $table->timestamps();

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
        Schema::drop('cars');
    }
}
