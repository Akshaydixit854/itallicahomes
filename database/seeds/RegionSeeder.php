<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'region_name' => 'Trentino Alto Adige',
            'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
        ]);
        DB::table('regions')->insert([
                'region_name' => 'Lombardia',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
        ]);
        DB::table('regions')->insert([
                'region_name' => 'Piemonte',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Liguria',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Marche',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Emilia Romagna',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Toscana',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Campania ( Napoli)',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Puglia',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Campania',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Sicilia',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Puglia',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Basilicata',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
        DB::table('regions')->insert([
                'region_name' => 'Sardegna',
                'description' => 'galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th'
            ]);
    }
        
}
