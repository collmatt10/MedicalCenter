<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $doctors = Doctor::all();

       return view('admin.doctors.index')->with([
         'doctors' => $doctors
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         $doctors = Doctor::all();
         return view('admin.doctors.create')->with([
           'doctors' => $doctors

         ]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name'=>'required|max:191',
          'email'=>'required|max:191',
          'password'=>'required|max:191',
          'postal_address'=>'required|max:191',
          'phonenumber'=>'required|max:191',
          'start_date'=>'required|max:191',

        ]);

        $user = new User();//made as a user first
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->postal_address = $request->input('postal_address');
        $user->phonenumber = $request->input('phonenumber');
        $user->save();

        $doctor = new Doctor();//when created as a user, made a doctor and give new role.
        $doctor->start_date = $request->input('start_date');
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.show')->with([
          'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.edit')->with([
        'doctor' => $doctor,

      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $doctor = Doctor::findOrFail($id);
      $user = User::findOrFail($id); //find the data on the user table
      $request->validate([
        'name'=>'required|max:191',
        'email'=>'required|max:191',
        'password'=>'required|max:191',
        'postal_address'=>'required|max:191',
        'phonenumber'=>'required|max:191',
        'start_date'=>'required|max:191',

      ]);

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->postal_address = $request->input('postal_address');
      $user->phonenumber = $request->input('phonenumber');
      $doctor->start_date = $request->input('start_date');

      $doctor->save();

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::findOrFail($id);

       $doctor->delete();
       return redirect()->route('admin.doctors.index');

      return view('admin.doctors.show')->with([
        'visit' => $doctor
      ]);
    }
}
