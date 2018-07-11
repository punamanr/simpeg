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
      ->select('employees.id as id_pegawai','employees.nip','employees.nama_lengkap','employees.status_pns','units.nama_unit')
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

    // public function kota_kabs(){
    //   $province_id = Input::get('province_id');
    //   $kota_kabs = Kota_kab::where('provinsi_id', '=', $province_id)->get();
    //   return response()->json($kota_kabs);
    // }

    public function kota_kabs($id){
      $states = DB::table("kota_kabs")->where("provinsi_id",$id)->pluck("kota_kabupaten","id");
      return json_encode($states);
    }


    public function create_tkk()
    {
    	return view('employees.create_tkk');
    }

    public function store(Request $request)
    {
        // return $request->all();
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee has been added');
    }

    public function edit($id)
    {
        // $data = DB::table('employees')->where('id', $id);
        // return view('employees.edit', compact('data'));

      $employee = Employee::findOrFail($id);
      $units = Unit::all();
      $provinces = Provinsi::all();
      $panggols = Pangkatgolongan::all();
      $agamas = Agama::all();
      $positions = Position::all();
      $kota_kabs = DB::table('kota_kabs')->select('id','kota_kabupaten')->where('id', $employee->kota_kab)->get();
      
      return view('employees.edit', compact('employee','units','provinces','panggols','agamas','positions','kota_kabs'));
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
      $unit = Employee::findOrfail($request->id_pegawai);
      $unit->update($request->all());
      return back();
      // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $data = Employee::findOrfail($request->id_pegawai);
      $data->delete();
      return back()->with('success', 'Data pegawai berhasil dihapus!');
    }

    public function hapus_pegawai($id)
    {
        $pegawai = Employee::findOrFail($id);
        $pegawai->delete();

        return back();
    }
}
