<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Employee;
use App\Unit;
use App\Provinsi;
use App\Kota_kab;
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
      return view('employees.index',compact('employees'));
    }

    public function create()
    {
      $units = Unit::all();
      $provinces = Provinsi::all();
      $panggols = Pangkatgolongan::all();
      $agamas = Agama::all();
      $positions = Position::all();
      return view('employees.create', compact('units','provinces','panggols','agamas','positions'));
    }

    public function kota_kabs(){
      $province_id = Input::get('province_id');
      $kota_kabs = Kota_kab::where('provinsi_id', '=', $province_id)->get();
      return response()->json($kota_kabs);
    }

    public function create_tkk()
    {
    	return view('employees.create_tkk');
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
        return view('employees.create_tkk', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $pegawai = Employee::findOrfail($request->id_pegawai);
      $pegawai->delete();
      return back();
    }
}
