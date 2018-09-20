<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Position;

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
        //ambil data array dari table
        $employee = DB::table('employees')
                    ->select('employees.id as id_pegawai','employees.nip','employees.nama_lengkap','employees.status_pns','units.nama_unit','employees.formasi_jabatan','employees.created_at','employees.updated_at','positions.nama_jabatan',
                      'pangkatgolongans.golongan','pangkatgolongans.pangkat',
                      DB::raw('(CASE WHEN employees.status_pns = 1 THEN "PNS" ELSE "TKK" END) AS status')
                      )
                    ->join('units', 'employees.kode_unit_kerja','=','units.id')
                    ->join('positions','employees.kode_jabatan_unit_kerja','=','positions.kode_jabatan')
                    ->join('pangkatgolongans','employees.golongan','=','pangkatgolongans.id')
                    ->get();
        // $employee = Employee::all();
        // dd($employee);

        $grafik_jabatan = DB::table('positions')
                          ->join('employees','positions.kode_jabatan', '=', 'employees.kode_jabatan_unit_kerja')
                          ->select(DB::raw('positions.kode_jabatan,count(positions.nama_jabatan) as total,positions.nama_jabatan'))
                          ->where([['positions.status_pejabat','0'],['employees.status_aktif','aktif'],])
                          ->groupBy('positions.kode_jabatan','positions.nama_jabatan')
                          ->get();

 
        $count_tkk = DB::table('employees')
        ->select('id')->where('status_pns',0)->count();
        //count data array sesuai dengan kondisi agar select ke table hanya 1 kali
        // $count_tkk = Employee::where('status_pns',0)->count();

        // $count_tkk = $employee->where('status_pns',0)->count();

        $count_pns = $employee->where('status_pns',1)->count();
        $count_struktural = $employee->where('formasi_jabatan','struktural')->count();
        $count_fungsional = $employee->where('formasi_jabatan','fungsional')->count();

        $update_terbaru_employee = $employee->sortByDesc('updated_at');     
        $data_struktural = $employee->where('formasi_jabatan','struktural');


        // dd($count_tkk);

        return view('home',compact('count_tkk','count_pns','count_fungsional','count_struktural','update_terbaru_employee' ,'data_struktural','grafik_jabatan' ));
    }
}
