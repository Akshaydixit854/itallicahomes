<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DestinationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $destination = new \App\Destination();
        $destination->destination_name = "Thaj Mahal";
        $destination->description = $faker->sentence;
        $destination->cover_image = "test-image.jpg";
        $destination->save();
    }
}
