<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');//only allows check of one role .
      //after modifying AuthRole you can now add a whole list

  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    // $user = Auth::user();
    //
    // $user->authorizeRoles('admin'); //can add other roles to see more dashboards

      return view('admin.home');
  }
}
