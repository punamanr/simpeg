<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_tkk = Employee::where('status_pns',0)->count();
        $count_pns = Employee::where('status_pns',1)->count();
        $count_struktural = Employee::where('status_pns',1)->count();
        $count_fungsional = Employee::where('status_pns',1)->count();
        return view('home',compact('count_tkk','count_pns'));
    }
}
