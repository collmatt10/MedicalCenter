<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
        $this->middleware('role:doctor');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {

        $visits = Visit::all();
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('doctor.visits.index')->with([
          'visits' => $visits,
          'doctors' => $doctors,
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
          $doctors = Doctor::all();
          $patients = Patient::all();
         return view('doctor.visits.create')->with([
           'doctors' => $doctors,
           'patients' => $patients
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
          'doctor_id'=>'required|max:191',
          'description'=>'required|max:191',
          'patient_id'=>'required|max:191',
          'date'=>'required|max:191',
          'time'=>'required|max:191',
          'cost'=>'required|max:12',

        ]);
        $visit = new Visit();
        $doctors = Doctor::all();
        $patients = Patient::all();

        $visit->doctor_id = $request->input('doctor_id');
        $visit->description = $request->input('description');
        $visit->patient_id = $request->input('patient_id');
        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->cost = $request->input('cost');

        $visit->save();

        return redirect()->route('doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visits = Visit::all();
      $doctors = Doctor::all();
      $patients = Patient::all();

      return view('doctor.visits.show')->with([
        'visits' => $visits,
        'doctors' => $doctors,
        'patients' => $patients
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
      $visits = Visit::all();
      $doctors = Doctor::all();
      $patients = Patient::all();

      return view('doctor.visits.edit')->with([
        'visits' => $visits,
        'doctors' => $doctors,
        'patients' => $patients
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

      $visit = Visit::findOrFail($id);
      $request->validate([

        'doctor_id'=>'required|max:191'.$visit->id,
        'description'=>'required|max:191',
        'patient_id'=>'required|max:191'.$visit->id,
        'date'=>'required|max:191',
        'time'=>'required|max:191',
        'cost'=>'required|max:12',
      ]);

      $visit->doctor_id = $request->input('doctor_id');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->cost = $request->input('cost');

      $visit->save();

      return redirect()->route('doctor.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);

       $visit->delete();
       return redirect()->route('doctor.visits.index');

      return view('doctor.visits.show')->with([
        'visit' => $visit
      ]);
    }
}
