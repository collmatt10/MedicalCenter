<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Patient;
class HomeController extends Controller
{

  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('role:patient'); //gives patient the patient authentication in the middleware
  }
  public function index()
  {
    return view('patient.home');
  }
}
