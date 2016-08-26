<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('image_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('address');

            $table->string('url');
            $table->string('facebook');
            $table->string('email');

            $table->float('lat');
            $table->float('lng');
            $table->integer('length');
            $table->integer('straight');
            $table->integer('width');
            $table->integer('slope');
            $table->integer('capacity');

            $table->longtext('es_description');
            $table->longtext('en_description');
            $table->longtext('ru_description');

            $table->timestamps();

            //Foreign Keys
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
        Schema::drop('tracks');
    }
}
