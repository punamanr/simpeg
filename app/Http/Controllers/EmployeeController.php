<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
// use APP\Provinsi;

class EmployeeController extends Controller
{
    public function index()
    {
      $employees = Employee::all();
      return view('employee.index',compact('employees'));
    }

    public function create()
    {
        // $provinces = Provinsi::all();
    	return view('employee.create',compact('provinces'));
    }

    public function create_tkk()
    {
    	return view('employee.create_tkk');
    }

    public function store(Request $request)
    {
        // return $request->all();
        Employee::create($request->all());
        return back()->with('success', 'Employee has been added');
    }

    public function edit($id)
    {
        $data['users'] = Employee::find($id);
        return view('employee.create_tkk', $data);
    }
}
