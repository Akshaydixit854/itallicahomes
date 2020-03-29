<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            $post = new \App\Post();
            $post->title = $faker->paragraph(1);
            $post->content = $faker->paragraph(2);
            $post->cover_image = "1539406278.gif";
            $post->published_by = "user";
            $post->save();
        }
    }
}
