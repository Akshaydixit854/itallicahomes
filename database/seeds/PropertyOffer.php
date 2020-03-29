<?php

use Illuminate\Database\Seeder;

class PropertyOffer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_offer')->insert([
            'offer_name' => 'Sale'
        ]);
       DB::table('property_offer')->insert([
            'offer_name' => 'Rent'
        ]);
       DB::table('property_offer')->insert([
            'offer_name' => 'Sale & Rent'
        ]);
       DB::table('property_offer')->insert([
            'offer_name' => 'Special Offer'
        ]);


    }
}
