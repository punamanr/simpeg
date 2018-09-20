<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Agreement;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $users = User::all();
      return view('users.index',compact('users'));
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
        //regisster user baru
        User::create([
            'nip' => $request['nip'],
            'name' => $request['nama_lengkap'],
            'email' => $request['nip'].'@rskk.com',
            'status' => 'user',
            'password' => bcrypt($request['password']),
        ]);

        //create data tkk ke table employee
        Employee::create([
          'nip' => $request['nip'],
          'nama_lengkap' => $request['nama_lengkap'],
          'kode_unit_kerja' => 99,
          'status_pns' => 1,
        ]);

        // $mail = $request['nip'].'@rskk.com';
        // dd($mail);

        return redirect()->route('users.index')->with('success', 'User baru berhasil ditambahkan.');
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
        //jika password Kosong
        if($request->password == '')
        {
          // $user = User::findOrfail($request->id_user);
          // $user->update($request->all());
          // return back();
          $user = User::findOrfail($request->id_user);
          $user->nip = $request->nip;
          $user->name = $request->name;
          $user->status = $request->status;
          $user->save();
          return back()->with('success', 'User '.$request->name. ' berhasil di edit.');
        }
        else {
          $user = User::findOrfail($request->id_user);
          $user->nip = $request->nip;
          $user->name = $request->name;
          $user->status = $request->status;
          $user->password = bcrypt($request->password);
          $user->save();
          return back()->with('success', 'User '.$request->name. ' berhasil di edit dan ganti password.');
        }
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
        // $user = User::select($request->user);
        // dd($user);
        // $user->delete();
        // return back()->with('success', 'Semua data User '.$request->name. ' berhasil dihapus.');
        // $user = DB::table("users")->where("nip",$request->nip)->get();
        // dd($user);

        //hapus data table user
        $user = User::where('nip', $request->user);
        $user->delete();

        //hapus data table employee
        $employee = Employee::where('nip', $request->user);
        $employee->delete();

        //hapus data table agreement untuk tkk
        $agreement = Agreement::where('nip', $request->user);
        $agreement->delete();

        // dd($user);
        return back()->with('success', 'Semua data User '.$request->name. ' berhasil dihapus.');


    }
}
