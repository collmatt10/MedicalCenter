<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RolesTableSeeder::class);  //calls all these table seeders
      $this->call(UsersTableSeeder::class);
      $this->call(DoctorsTableSeeder::class);
      $this->call(PatientsTableSeeder::class);





    }
}
