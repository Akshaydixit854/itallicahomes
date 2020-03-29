<?php

use Illuminate\Database\Seeder;

class Condition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condition')->insert([
            'condition_name' => 'new',
            'condition_display_name' => 'New'
        ]);
        DB::table('condition')->insert([
            'condition_name' => 'restored',
            'condition_display_name' => 'Restored'
        ]);
        DB::table('condition')->insert([
            'condition_name' => 'raw_construction',
            'condition_display_name' => 'RAW Construction'
        ]);
        DB::table('condition')->insert([
            'condition_name' => 'habitable',
            'condition_display_name' => 'Habitable'
        ]);
        DB::table('condition')->insert([
            'condition_name' => 'need_renovation',
            'condition_display_name' => 'Ned Renovation'
        ]);
        DB::table('condition')->insert([
            'condition_name' => 'ruin',
            'condition_display_name' => 'Ruin'
        ]);

    }
}
