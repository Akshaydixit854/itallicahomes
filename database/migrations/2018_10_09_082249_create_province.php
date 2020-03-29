<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvince extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province_name');
            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->nullable();
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
        Schema::dropIfExists('provinces');
    }
}
