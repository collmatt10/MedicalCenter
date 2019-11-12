<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Doctor;
class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $role_user =  Role::where('name','doctor')->first();

      foreach ($role_user->users as $user) {
        $doctor = new Doctor();
        $doctor->start_date = "1/1/12";

        $doctor->user_id = $user->id;

        $doctor->save();
        }
    }

}
