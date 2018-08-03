@extends('layouts.app')

@section('content')
<!-- {{ Route::currentRouteName()}} -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Data Karyawan</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Data Karyawan
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-6 col-xs-12">
            <div class="form-group">
              <a href="{{route('employees.create',['status' => 'pns'])}}"><button type="button" class="btn-icon btn btn-success btn-secondary btn-round"><i class="ft-plus"></i> PNS</button></a>
              <a href="{{route('employees.create',['status' => 'tkk'])}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> TKK</button></a>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Zero configuration table -->
          <section id="configuration">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Pegawai RSKK</h4>
                              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                              <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="card-body collapse in">
                              <div class="card-block card-dashboard">
                                  @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div><br />
                                  @endif
                                  @if (\Session::has('success'))
                                  <div class="alert alert-success alert-dismissible fade in mb-2">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <p>{{ \Session::get('success') }}</p>
                                  </div>
                                  @endif
                                  <p class="card-text">Data pegawai PNS dan Non PNS dilingkungan RSUD Kesehatan Kerja Provinsi Jawa Barat.</p>
                                  <table class="table table-striped table-bordered compact">
                                      <thead>
                                          <tr>
                                              <th width="10%">NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Unit Kerja</th>
                                              <th width="5%">Status</th>
                                              <th><center>Detail</center></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($employees as $employee)
                                          <?php
                                          if($employee->status_pns == 0)
                                          {
                                            $form = 'create_tkk';
                                          }
                                          elseif ($employee->status_pns == 1)
                                          {
                                            $form = 'create';
                                          }
                                          ?>
                                          <tr>
                                              <td><center>{{$employee->nip}}</center></td>
                                              <td>{{$employee->nama_lengkap}}</td>
                                              <td>{{$employee->nama_unit}}</td>
                                              <td><center>@if($employee->status_pns == 0)
                                                  {{'TKK'}}
                                                  @else
                                                  {{'PNS'}}
                                                  @endif
                                                  </center>
                                              </td>
                                              <td><center>{{-- <a href="{{route('employees.create', ['id' => $employee->id, 'do' => 'detail'])}}" class="btn btn-sm btn-primary">Detail</a> --}}
                                                  <a href="{{ route('employees.edit', $employee->id_pegawai) }}" class="btn btn-warning btn-sm">Edit</a>
                                                  <button type="button" class="btn btn-danger btn-sm" data-nama="{{$employee->nama_lengkap}}" data-nip="{{$employee->nip}}"  data-peg_id="{{$employee->id_pegawai}}" data-toggle="modal" data-target="#delete"><i class="ft-trash"></i> Delete</button></center>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Unit Kerja</th>
                                              <th>Status</th>
                                              <th><center>Detail</center></th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--/ Zero configuration table -->
        </div>
      </div>
</div>

<div class="modal fade text-xs-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-danger white">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel9"><i class="fa fa-trash"></i> Delete Confirmation</h4>
    </div>
    <form action="{{route('employees.destroy','destroy')}}" method="post">
    {{method_field('delete')}}
    {{csrf_field()}}
    <div class="modal-body">
      <div class="form-group">
        <p>Apakah Anda yakin akan menghapus data karyawan ini? </p>
        <input type="hidden" name="id_pegawai" id="peg_id" value="">
        <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" disabled="disabled">

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-danger">Ya, Hapus</button>
    </div>
    </form>
  </div>
  </div>
</div>
@endsection
