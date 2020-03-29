<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new \App\Settings();
        $setting->default_vat = "5%";
        $setting->save();
    }
}
