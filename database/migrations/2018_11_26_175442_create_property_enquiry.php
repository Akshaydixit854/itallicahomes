<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyEnquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_enquiries', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->text('message');
            $table->integer('property_id');
            $table->increments('id');
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
        Schema::dropIfExists('property_enquiries');
    }
}
