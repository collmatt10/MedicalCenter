<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Doctor;
class HomeController extends Controller
{

  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('role:doctor'); //gives doctor the dcotor role authentication
  }
  public function index()
  {
    return view('doctor.home');
  }
}
