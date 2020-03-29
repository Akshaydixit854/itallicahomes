<?php

use Illuminate\Database\Seeder;

class AdminSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_settings')->insert([
            'key' => 'price_range_slider_min_value',
            'value' => '0',
        ]);
        DB::table('admin_settings')->insert([
            'key' => 'price_range_slider_max_value',
            'value' => '10000',
        ]);
    }
}
