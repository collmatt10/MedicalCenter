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

      $role_user =  Role::where('name','doctor')->first();  //creates a new user role where the name is doctor

      foreach ($role_user->users as $user) {
        $doctor = new Doctor(); //new doctor
        $doctor->start_date = "1/1/12";

        $doctor->user_id = $user->id;  //the user_id on the doctors table is the id on the users table

        $doctor->save();
        }
    }

}
