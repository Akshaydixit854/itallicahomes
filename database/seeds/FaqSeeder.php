<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $faq = new \App\Faq();
            $faq->question = $faker->paragraph(1);
            $faq->answer = $faker->paragraph(2);
            $faq->priority = $faker->randomDigit;
            $faq->save();
        }
    }
}
