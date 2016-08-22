<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('image_id')->unsigned()->index();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('lat');
            $table->string('lng');
            $table->string('url');
            $table->string('facebook');
            $table->string('email');
            $table->string('length');
            $table->string('straight');
            $table->string('curves');
            $table->string('width');
            $table->string('slope');
            $table->string('capacity');
            $table->string('services');
            $table->longtext('description');
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
        Schema::drop('circuits');
    }
}
