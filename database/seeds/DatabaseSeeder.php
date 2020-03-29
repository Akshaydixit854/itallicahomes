<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          //$this->call(PermissionSeed::class);
          //$this->call(RoleSeed::class);
          //$this->call(UserSeed::class);
          $this->call(Condition::class);
          $this->call(DestinationsSeeder::class);
          $this->call(PropertyOffer::class);
          $this->call(PropertyType::class);
          $this->call(RegionSeeder::class);
          $this->call(LocationSeeder::class);
          $this->call(UserSeed::class);
          $this->call(Condition::class);

    }
}
