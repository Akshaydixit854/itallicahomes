<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property_id');
            $table->string('name');
            $table->string('short_description');
            $table->string('detail_description')->nullable();
            $table->string('beds')->nullable();
            $table->longtext('baths')->nullable();
            $table->text('plot_size')->nullable();
            $table->string('living_area')->nullable();
            $table->string('parking')->nullable();
            $table->string('availability')->nullable();
            $table->string('property_location_latitude')->nullable();
            $table->string('property_location_longitude')->nullable();
            $table->string('cover_image_name')->nullable();
            $table->decimal('price')->default(0.00);
            $table->decimal('special_price')->default(0.00);;
            $table->decimal('vat')->default(0.00);
            $table->decimal('price_upon_request')->default(0.00);
            $table->string('status')->nullable();
            $table->integer('condition_id')->unsigned()->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('destination_id')->unsigned()->nullable();
            $table->integer('offer_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->nullable();
            $table->foreign('destination_id')->references('id')->on('destinations')->nullable();
            $table->foreign('offer_id')->references('id')->on('property_offer')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')->nullable();
            $table->foreign('type_id')->references('id')->on('property_types')->nullable();
            $table->foreign('condition_id')->references('id')->on('condition')->nullable();
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
        //
    }
}
