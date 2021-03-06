<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Doctor;
use App\Patient;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();        //creates theses roles in the roles table
      $role_user = Role::where('name', 'user')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();

      $admin = new User();
      $admin->name = 'Matthew Collins';
      $admin->email = 'admin@medicalcenter.ie';
      $admin->password = bcrypt('secret');
      $admin->postal_address = ('IADT');
      $admin->phonenumber = ('0871234567');
      $admin->save();
      $admin->roles()-> attach($role_admin); //attaches this role to this user

      $user = new User();
      $user->name = 'Luke Collins';
      $user->email = 'luke@medicalcenter.ie';
      $user->password=bcrypt('secret');
      $user->postal_address = ('IADT');
      $user->phonenumber = ('0871234567');
      $user->save();
      $user->roles()-> attach($role_user);

      $user = new User();
      $user->name = 'Darren Fagan';
      $user->email = 'Darren@medicalcenter.ie';
      $user->password=bcrypt('secret');
      $user->postal_address = ('IADT');
      $user->phonenumber = ('0871234567');
      $user->save();
      $user->roles()-> attach($role_doctor);

      $user = new User();
      $user->name = 'Doctor Collins';
      $user->email = 'DoctorCollins@medicalcenter.ie';
      $user->password=bcrypt('secret');
      $user->postal_address = ('IADT');
      $user->phonenumber = ('0871234567');
      $user->save();
      $user->roles()-> attach($role_doctor);

      $user = new User();
      $user->name = 'Dylan Chan';
      $user->email = 'Dylan@medicalcenter.ie';
      $user->password=bcrypt('secret');
      $user->postal_address = ('IADT');
      $user->phonenumber = ('0871234567');
      $user->save();
      $user->roles()-> attach($role_patient);
   }
}
