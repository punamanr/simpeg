<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Agreement;
use App\Unit;
use App\Bpjs_master;
use App\Employee;
use App\User;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $agreements = Agreement::all();
      return view('agreements.index',compact('agreements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $agreements = DB::table('agreements')
      ->select('agreements.id','agreements.nip','agreements.nama_lengkap','agreements.no_sk','units.nama_unit')
      ->join('units', 'agreements.kode_unit_kerja','=','units.id')
      ->get();

      $units = Unit::all();
      $bpjs = Bpjs_master::first(); //ambil data persentasi bpjs ketenagakerjaan dan kesehatan
      // $AWAL = 'SK/TKK-RSKK';
      $AWAL = '814.1'; //tata nashkah Pengangkatan tenaga lepas bulanan / kontrak
      $TENGAH = '-RSKK';
      // karna array dimulai dari 0 maka kita tambah di awal data kosong
      // bisa juga mulai dari "1"=>"I"
      $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
      //di comment dulu karena manual SK (07 Aug 2018 - Purnama)
      // $noUrutAkhir = Agreement::max('no_sk');
      $noUruttkk = Agreement::max('nip');

      //di comment dulu karena manual SK (07 Aug 2018 - Purnama)
      // $sk = substr($noUrutAkhir,6,3); //urutan SK terakhir

      $nip = substr($noUruttkk, 6); //urutan NIP terakhir

      //di comment dulu karena manual SK (07 Aug 2018 - Purnama)
      // $no = 1;
      // if($noUrutAkhir) {
      //     // echo "No urut surat di database : " . $noUrutAkhir;
      //     // echo "<br>";
      //     // echo "Pake Format : " . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      //     // $no_sk = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      //     $no_sk = $AWAL .'/' . sprintf("%03s", abs($sk + 1)). $TENGAH . '/' . $bulanRomawi[date('n')] .'/' . date('Y');
      // }
      // else {
      //     // echo "No urut surat di database : 0" ;
      //     // echo "<br>";
      //     // echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      //     // $no_sk = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      //     $no_sk = $AWAL .'/' . sprintf("%03s", $no). $TENGAH . '/' . $bulanRomawi[date('n')] .'/' . date('Y');
      // }

      //NIP otomatis untuk TKK baru
      if($noUruttkk)
      {
        // $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $nip + 1);
        $nip_otomatis = '201806' . sprintf("%04s", $nip + 1);
      }
      else
      {
        $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $no);
      }

      return view('agreements.create',compact('no_sk','nip_otomatis','units','bpjs','agreements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Agreement::create($request->all());
        // return redirect()->route('agreements.index')->with('success', 'Kontrak berhasil dibuat!');
      // print_r($request);

        if($request['formula_bpjs'] == 'gaji_kotor')
        {
          $tunjangan_ketenagakerjaan = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['bpjs_ketenagakerjaan']);
          $tunjangan_kesehatan = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['bpjs_kesehatan']);
          $potongan_pegawai = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['bpjs_potongan_pegawai']);
          $gaji_bersih = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['nett_salary']);
        }
        else
        {
          $tunjangan_ketenagakerjaan = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['umk_bpjs_ketenagakerjaan']);
          $tunjangan_kesehatan = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['umk_bpjs_kesehatan']);
          $potongan_pegawai = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['umk_bpjs_potongan_pegawai']);
          $gaji_bersih = preg_replace("/[^a-zA-Z0-9 -]/", "", $request['umk_nett_salary']);
        }

        //create kontrak tkk
        Agreement::create([
          'nip' => $request['nip'],
          'no_sk' => $request['no_sk'],
          'nama_lengkap' => $request['nama_lengkap'],
          'kode_unit_kerja' => $request['kode_unit_kerja'],
          'tgl_awal_kontrak' => $request['tgl_awal_kontrak'],
          'tgl_akhir_kontrak' => $request['tgl_akhir_kontrak'],
          'gaji_pokok' => $request['gaji_pokok'],
          'insentif' => $request['insentif'],
          'jasa_pelayanan' => $request['jasa_pelayanan'],
          'formula_bpjs' => $request['formula_bpjs'],
          'tunjangan_ketenagakerjaan' => $tunjangan_ketenagakerjaan,
          'tunjangan_kesehatan' => $tunjangan_kesehatan,
          'potongan_pegawai' => $potongan_pegawai,
          'gaji_bersih' => $gaji_bersih
        ]);

        //create data tkk ke table employee
        Employee::create([
          'nip' => $request['nip'],
          'nama_lengkap' => $request['nama_lengkap'],
          'no_sk' => $request['no_sk'],
          'kode_unit_kerja' => $request['kode_unit_kerja'],
          'status_pns' => 0
        ]);

        //create data ke table user dan nip sebagai id login (password default = 123456)
        User::create([
            'nip' => $request['nip'],
            'name' => $request['nama_lengkap'],
            'email' => $request['nip'].'@rskk.com',
            'status' => 'user',
            'password' => bcrypt(123456),
        ]);

        return redirect()->route('agreements.index')->with('success', 'Kontrak berhasil ditambahkan.');


        // $business = Business::create([
        //     'name' => 'best business ever'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('agreements.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    // public function destroy($id)
    // {
    //     //
    // }
    public function destroy(Request $request)
    {
      //hapus data di table agreement
      $agreement = Agreement::where('nip', $request->nip);
      $agreement->delete();

      //hapus data di table employee
      $employee = Employee::where('nip', $request->nip);
      $employee->delete();

      //hapus data di table agreement
      $user = User::where('nip', $request->nip);
      $user->delete();

      return back()->with('success', 'Data pegawai berhasil dihapus!');

    }
}
