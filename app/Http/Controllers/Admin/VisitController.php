<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $visits = Visit::all();

       return view('admin.visits.index')->with([
         'visits' => $visits
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visits.create');
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
          'cost'=>'required|alpha_num|size:13|unique:visits',

        ]);
        $visit = new Visit();
        $visit->doctor_id = $request->input('doctor_id');
        $visit->description = $request->input('description');
        $visit->patent_id = $request->input('patent_id');
        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->cost = $request->input('cost');

        $visit->save();

        return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('admin.visits.show')->with([
          'visit' => $visit
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
      $visit = Visit::findOrFail($id);

      return view('admin.visits.edit')->with([
        'visit' => $visit,
        'doctors' => $doctors,
        'patients' => $patients,
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
        'doctor_id'=>'required|max:191'. $visit->id,
        'description'=>'required|max:191',
        'patient_id'=>'required|max:191',$visit->id,
        'date'=>'required|max:191',
        'time'=>'required||size:13|',
        'cost'=>'required|numeric|min:0',
      ]);

      $visit->doctor_id = $request->input('doctor_id');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->cost = $request->input('cost');

      $visit->save();

      return redirect()->route('admin.visits.index');
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
       return redirect()->route('admin.visits.index');

      return view('admin.visits.show')->with([
        'visit' => $visit
      ]);
    }
}
