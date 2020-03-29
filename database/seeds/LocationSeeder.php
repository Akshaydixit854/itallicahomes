<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new \App\Location();
        $location->location_name = "Colombo";
        $location->region_id = 2;
        $location->save();
    }
}
