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
    	// Employee::create([
        // $nip = $request->input('nip');
        // $nama_lengkap = $request->input('nama_lengkap');
        // $tempat_lahir = $request->input('tempat_lahir');
        // $tanggal_lahir = $request->input('tanggal_lahir');
        // $jenis_kelamin = $request->input('jenis_kelamin');
        // $status_perkawinan = $request->input('status_perkawinan');
        // $alamat = $request->input('alamat');
        // 'nip' => request('nip'),
        // 'nama_lengkap' => request('nama_lengkap'),
        // 'tempat_lahir' => request('tempat_lahir'),
        // 'tanggal_lahir' => request('tanggal_lahir'),
        // 'jenis_kelamin' => request('jenis_kelamin'),
        // 'status_perkawinan' => request('status_perkawinan'),
        // 'alamat' => request('alamat'),
        // 'kecamatan' => request('kecamatan'),
        // 'kota_kab' => request('kota_kab'),
        // 'telepon' => request('telepon'),
        // 'kode_pos' => request('kode_pos'),
        // 'unit_kerja' => request('unit_kerja'),
        // 'formasi_jabatan' => request('formasi_jabatan'),
        // 'jabatan_unit_kerja' => request('jabatan_unit_kerja'),
        // 'status_aktif' => request('status_aktif'),
        // 'nip_atasan_langsung' => request('nip_atasan_langsung')
    	// ]);
    return back()->with('success', 'Employee has been added');
    }

    public function edit($id)
    {
        $data['users'] = Employee::find($id);
        return view('employee.create_tkk', $data);
    }
}
