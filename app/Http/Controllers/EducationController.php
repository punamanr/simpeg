<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Employee;
use App\Position;
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
        // foreach ($pendidikan as $data) {
        //   dd($data->employee->position);
        // }

        //select distinct data pendidikan pegawai berdasarkan jenjang terakhir
        // $aa = DB::table('educations')
        // ->select('nip_employee',DB::raw('MAX(jenjang_pendidikan) as pendidikan'),DB::raw('MAX(tahun_lulus) as lulus'))
        // ->groupBy('nip_employee')
        // ->get();
        // dd($aa);

        // $bb = DB::table('educations')
        //     ->join('$aa as data', 'educations.nip_employee', '=', 'data->nip_employee')
        //     ->join($aa, 'educations.jenjang_pendidikan', '=', '$data->pendidikan')
        //     ->select('educations.*')
        //     ->get();

        // dd($bb);

        // $bb = DB::table('educations')
        // ->where('nip_employee','=',$aa->nip_employee)
        // ->get();
        // dd($bb);

        $pendidikan = DB::table('employees')
            ->join('educations', 'employees.nip', '=', 'educations.nip_employee')
            ->join('positions', 'employees.kode_jabatan_unit_kerja','=','positions.kode_jabatan')
            ->select('employees.nip','employees.nama_lengkap','positions.nama_jabatan',DB::raw('MAX(educations.jenjang_pendidikan) as pendidikan'),'employees.status_pns')
            ->distinct()
            ->groupBy('employees.nip','employees.nama_lengkap','positions.nama_jabatan','employees.status_pns')
            ->get();
        //dd($pendidikan);

            
        // $pendidikan = Education::with('employee.position')->get();
        // dd($pendidikan);
        // dd($pendidikan->employee->position);
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
    public function edit(Request $request, $id)
    {
        //
        $data = Education::findOrFail($id);
        // $data = Education::all()->where('nip_employee',$id);
        // foreach ($data as $aa) {
        //   // echo 'id = '.$aa->id;
        //   // $pendidikan = $data::with('employee.position')->where('id', $aa->id)->get();
        // }
                // dd($data);

        $pendidikan = $data::with('employee.position')->where('id', $data->id)->get();
        // $pendidikan = $data::with('employee.position')->where('id', $data->id)->get();
        // $pendidikan = $data::with('employee.position')->where('id', $data->id)->get();
        dd($pendidikan);
        // return view('educations.edit', compact('pendidikan','data'));

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
