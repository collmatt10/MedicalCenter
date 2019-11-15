<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Patient;

class PatientController extends Controller
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
       $patients = Patient::all();

       return view('admin.patients.index')->with([
         'patients' => $patients
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
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
        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = $request->input('password');
        $patient->postal_address = $request->input('postal_address');
        $patient->phonenumber = $request->input('phonenumber');
        $patient->start_date = $request->input('start_date');

        $patient->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patients.show')->with([
          'patient' => $patient
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
      $patient = Patient::findOrFail($id);

      return view('admin.patients.edit')->with([
        'patient' => $patient,
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

      $patient = Patient::findOrFail($id);
      $request->validate([
        'name'=>'required|max:191',
        'email'=>'required|max:191',
        'password'=>'required|max:191',
        'postal_address'=>'required|max:191',
        'phonenumber'=>'required|max:191',
        'insurance'=>'required|max:191',
        'policyNum'=>'required|max:191',

      ]);
      $patient = new Patient();
      $patient->name = $request->input('name');
      $patient->email = $request->input('email');
      $patient->password = $request->input('password');
      $patient->postal_address = $request->input('postal_address');
      $patient->phonenumber = $request->input('phonenumber');
      $patient->insurance = $request->input('insurance');
      $patient->policyNum = $request->input('policyNum');

      $patient->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);

       $patient->delete();
       return redirect()->route('admin.patients.index');

      return view('admin.patients.show')->with([
        'patient' => $patient
      ]);
    }
}
