<?php

use Illuminate\Database\Seeder;

class PropertyType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_types')->insert([
            'type_name' => 'House',
            'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
            'ui_color' => '#FF0000'

        ]);
    DB::table('property_types')->insert([
            'type_name' => 'Flat',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);
    DB::table('property_types')->insert([
            'type_name' => 'Villa',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);
    DB::table('property_types')->insert([
            'type_name' => 'Land/Lot',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);
    DB::table('property_types')->insert([
            'type_name' => 'Vineyard/Olive',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);
    DB::table('property_types')->insert([
            'type_name' => 'Farm',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);
    DB::table('property_types')->insert([
            'type_name' => 'Rustico/Country House',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);

    DB::table('property_types')->insert([
            'type_name' => 'Commercial',
        'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',
        'ui_color' => '#FF0000'

    ]);

    }
}
