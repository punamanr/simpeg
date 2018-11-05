<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Employee;
use App\Education;
use App\Unit;
use Carbon;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $pendidikan = Education::all();
        $pendidikan = DB::table('employees')
        ->select('employees.id as id_pegawai','employees.nip','employees.nama_lengkap','employees.status_pns','employees.', 'educations.nama_jurusan','educations.nama_instansi_pendidikan','educations.nama_fakultas','educations.jenjang_pendidikan','educations.path_scan_ijazah',
                DB::raw('(CASE WHEN employees.status_pns = 1 THEN "PNS" ELSE "TKK" END) AS status'))
        ->join('educations', 'employees.nip','=','educations.nip_employee')
        ->get(); 
        return view('educations.index',compact('pendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = DB::table('employees')
        ->select('employees.id as id_pegawai','employees.nip','employees.nama_lengkap','employees.status_pns',
                'units.nama_unit', DB::raw('(CASE WHEN employees.status_pns = 1 THEN "PNS" ELSE "TKK" END) AS status'))
        ->join('units', 'employees.kode_unit_kerja','=','units.id')
        ->get(); 
        return view('educations.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nip' => 'required',
        'nama_instansi_pendidikan' => 'required',
        'nama_jurusan' => 'required',
        'gelar' => 'required',
        'tahun_masuk' => 'required',
        'tahun_lulus' => 'required',
        'path_scan_ijazah.*' => 'required|max:2048',
      ]);

      // dd($request);

      if($request->hasFile('path_scan_ijazah'))
      {
        $allowedfileExtension=['jpeg','jpg','png']; //rule extensi yang diperbolehkan diupload
        $files = $request->file('path_scan_ijazah');
        $nip = $request->nip;
        $no = 0;

        foreach ($files as $file) {
          $filename = $file->getClientOriginalName(); //nama file original
          $extension = $file->getClientOriginalExtension(); //extension file
          $check=in_array($extension,$allowedfileExtension);
          // echo 'save';
          // dd($check);
          if($check) //jika extension file sesuai dengan rule
          {
            // echo "upload new";
            // $path = $file->store('public/upload/ijazah'); //upload file images
            $education = new Education();
            $education->nip_employee = $nip;
            $education->nama_instansi_pendidikan = $request['nama_instansi_pendidikan'][$no];
            $education->nama_fakultas = $request['fakultas'][$no];
            $education->nama_jurusan = $request['nama_jurusan'][$no];
            $education->jenjang_pendidikan = $request['jenjang_pendidikan'][$no];
            $education->nomor_ijazah = $request['nomor_ijazah'][$no];
            $education->gelar = $request['gelar'][$no];
            $education->tahun_masuk = $request['tahun_masuk'][$no];
            $education->tahun_lulus = $request['tahun_lulus'][$no];
            $education->path_scan_ijazah = $file->store('public/upload/ijazah');
            $education->save();
            $no++;
          }
        }
      }
      //kembali ke halaman upload
      return redirect()->back()->with('success', 'Ijazah berhasil diupload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
