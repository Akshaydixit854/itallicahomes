<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->timestamps();
            $table->integer('property_id')->unsigned()->nullable();
            $table->integer('amenities_id')->unsigned()->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->nullable();
            $table->foreign('amenities_id')->references('id')->on('amenities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
