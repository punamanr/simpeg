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
use App\Agreement;
use App\User;

class EmployeeController extends Controller
{
    public function index()
    {
      $employees = DB::table('employees')
      ->select('employees.id as id_pegawai','employees.nip','employees.nama_lengkap','employees.status_pns','units.nama_unit','employees.formasi_jabatan')
      ->join('units', 'employees.kode_unit_kerja','=','units.id')
      ->get();

      // $querytkk = $employees->all();
      // $plucktkk = $querytkk->pluck('nama_lengkap');

      $pns = $employees->where('status_pns',1);
      $tkk = $employees->where('status_pns',0);

      // $attendance->count();
      // $plucktkk->where('status_pns',1);

      // dd($plucktkk);

      // $tkk = $querytkk->get();
      // $querytkk = $user->coupons()->where('is_activated_flg', 1)->where('is_used_flg', 0);
      // $couponCollection = $couponQuery->get();
      return view('employees.index',compact('pns','tkk'));
    }

    public function create()
    {
      $units = Unit::all();
      $provinces = Provinsi::all();
      $panggols = Pangkatgolongan::all();
      $agamas = Agama::all();
      $positions = Position::all();
      $agreements = DB::table('agreements')
      ->select('agreements.id','agreements.nip','agreements.nama_lengkap','agreements.no_sk','units.nama_unit')
      ->join('units', 'agreements.kode_unit_kerja','=','units.id')
      ->get();
      return view('employees.create', compact('units','provinces','panggols','agamas','positions','agreements'));
    }

    public function kota_kabs($id){
      $states = DB::table("kota_kabs")->where("provinsi_id",$id)->pluck("kota_kabupaten","id");
      return json_encode($states);
    }

    public function otomatis(){
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
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan.');
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
      return redirect()->route('employees.index')->with('success', 'Edit Data Karyawan berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      // $data = Employee::findOrfail($request->id_pegawai);
      // $data->delete();

      //hapus data di table employee
      $employee = Employee::where('nip', $request->nip);
      $employee->delete();

      //hapus data di table agreement
      $agreement = Agreement::where('nip', $request->nip);
      $agreement->delete();

      //hapus data di table agreement
      $user = User::where('nip', $request->nip);
      $user->delete();

      return back()->with('success', 'Data pegawai berhasil dihapus!');

    }

    public function hapus_pegawai($id)
    {
        $pegawai = Employee::findOrFail($id);
        $pegawai->delete();

        return back();
    }
}
