<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Bpjs_master;
use DB;

class Bpjs_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bpjs_master::first();
        $tunjangan_jht = $data->tunjangan_jht *100;
        $tunjangan_jkk = $data->tunjangan_jkk *100;
        $tunjangan_jk = $data->tunjangan_jk *100;
        $tunjangan_jp = $data->tunjangan_jp *100;
        $tunjangan_kesehatan = $data->tunjangan_kesehatan *100;
        $tunjangan_ketenagakerjaan = $tunjangan_jht + $tunjangan_jkk + $tunjangan_jk + $tunjangan_jp;
        $potongan_peg_ketenagakerjaan = $data->potongan_peg_ketenagakerjaan *100;
        $potongan_peg_kesehatan = $data->potongan_peg_kesehatan *100;

        return view('bpjs_masters.index',compact('data','tunjangan_jht','tunjangan_jkk','tunjangan_jk','tunjangan_jp','tunjangan_kesehatan','potongan_peg_ketenagakerjaan','potongan_peg_kesehatan','tunjangan_ketenagakerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $bpjs = Bpjs_master::findOrfail($request->id_bpjs);
        // $bpjs->update($jht);
        // $bpjs->update($request->all());
        // return back();
        $bpjs->tunjangan_jht = $request->tunjangan_jht / 100;
        $bpjs->tunjangan_jkk = $request->tunjangan_jkk / 100;
        $bpjs->tunjangan_jk = $request->tunjangan_jk / 100;
        $bpjs->tunjangan_jp = $request->tunjangan_jp / 100;
        $bpjs->tunjangan_kesehatan = $request->tunjangan_kesehatan / 100;
        $bpjs->potongan_peg_kesehatan = $request->potongan_peg_kesehatan / 100;
        $bpjs->potongan_peg_ketenagakerjaan = $request->potongan_peg_ketenagakerjaan / 100;
        $bpjs->save();
        return back();
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
