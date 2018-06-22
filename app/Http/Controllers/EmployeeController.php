<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Unit;
use App\Provinsi;
use App\Pangkatgolongan;
use App\Agama;
use App\Position;

class EmployeeController extends Controller
{
    public function index()
    {
      // $employees = Employee::all();
      $employees = DB::table('employees')
      ->join('units', 'employees.kode_unit_kerja','=','units.id')
      ->get();
      return view('employee.index',compact('employees'));
    }

    public function create()
    {
     //  $provinces = Provinsi::all();
    	// return view('employee.create',compact('provinces'));
      $units = Unit::all();
      $provinces = Provinsi::all();
      $panggols = Pangkatgolongan::all();
      $agamas = Agama::all();
      $positions = Position::all();
      return view('employee.create', compact('units','provinces','panggols','agamas','positions'));
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

    public function destroy(Request $request)
    {
      $employee = Employee::findOrfail($request->id_pegawai);
      $employee->delete();
      return back();
    }
}
