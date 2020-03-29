<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $property = new \App\Property();
        $property->name = $faker->name;
        $property->short_description = $faker->paragraph(1);
        $property->detail_description = $faker->paragraph;
        $property->beds = $faker->numberBetween(1,5);
        $property->baths = $faker->numberBetween(1,9);
        $property->plot_size = $faker->numberBetween(10,50) . " Sq. m";
        $property->living_area = $faker->numberBetween(10,50) . " Sq. m";
        $property->parking = 'Y';
        $property->availability = 'Y';
        $property->property_location_latitude = '1.23222';
        $property->property_location_longitude = '1.4211';
        $property->cover_image_name = 'test-image.jpg';
        $property->price = '23423';
        $property->condition_id = 1;
        $property->location_id = 1;
        $property->type_id = 1;
        $property->destination_id = 1;
        $property->offer_id = 1;
        $property->condition_id = 1;
        $property->save();

    }
}