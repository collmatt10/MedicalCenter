<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
class HomeController extends Controller
{

  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('role:user');
  }
  public function index()
  {
    return view('user.home');
  }
}
