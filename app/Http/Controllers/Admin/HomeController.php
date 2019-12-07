<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Admin;
class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
        $this->middleware('role:admin');//checks role is admin before bringing them to home file
  }
    public function index()
    {
      return view('admin.home');
    }
}
