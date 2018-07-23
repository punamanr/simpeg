<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agreement;
use App\Unit;
use App\Bpjs_master;

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

      $AWAL = 'SK/TKK-RSKK';
      // karna array dimulai dari 0 maka kita tambah di awal data kosong
      // bisa juga mulai dari "1"=>"I"
      $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
      $noUrutAkhir = Agreement::max('no_sk');
      $noUruttkk = Agreement::max('nip');
      $no = 1;
      if($noUrutAkhir) {
          // echo "No urut surat di database : " . $noUrutAkhir;
          // echo "<br>";
          // echo "Pake Format : " . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          $no_sk = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      }
      else {
          // echo "No urut surat di database : 0" ;
          // echo "<br>";
          // echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          $no_sk = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
      }

      if($noUruttkk)
      {
        $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $noUruttkk + 1);
      }
      else 
      {
        // $nip_otomatis = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $no);
      }

      return view('agreements.index',compact('agreements','no_sk','nip_otomatis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $units = Unit::all();
      $bpjs = Bpjs_master::first(); //ambil data persentasi bpjs ketenagakerjaan dan kesehatan
      // $AWAL = 'SK/TKK-RSKK';
      $AWAL = '814.1'; //tata nashkah Pengangkatan tenaga lepas bulanan / kontrak
      $TENGAH = '-RSKK';
      // karna array dimulai dari 0 maka kita tambah di awal data kosong
      // bisa juga mulai dari "1"=>"I"
      $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
      $noUrutAkhir = Agreement::max('no_sk');
      $noUruttkk = Agreement::max('nip');
      $no = 1;
      if($noUrutAkhir) {
          // echo "No urut surat di database : " . $noUrutAkhir;
          // echo "<br>";
          // echo "Pake Format : " . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          // $no_sk = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          $no_sk = $AWAL .'/' . sprintf("%03s", abs($noUrutAkhir + 1)). $TENGAH . '/' . $bulanRomawi[date('n')] .'/' . date('Y');
      }
      else {
          // echo "No urut surat di database : 0" ;
          // echo "<br>";
          // echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          // $no_sk = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
          $no_sk = $AWAL .'/' . sprintf("%03s", $no). $TENGAH . '/' . $bulanRomawi[date('n')] .'/' . date('Y');
      }

      //NIP otomatis untuk TKK baru
      if($noUruttkk)
      {
        $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $noUruttkk + 1);
      }
      else 
      {
        $nip_otomatis = date('Y') . date('m') . sprintf("%04s", $no);
      }

      return view('agreements.create',compact('no_sk','nip_otomatis','units','bpjs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agreement::create($request->all());
        return redirect()->route('agreements.index')->with('success', 'Kontrak berhasil dibuat!');
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
    public function destroy($id)
    {
        //
    }
}
