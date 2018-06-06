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
              <a href="{{route('employee.create',['status' => 'pns'])}}"><button type="button" class="btn-icon btn btn-success btn-secondary btn-round"><i class="ft-plus"></i> PNS</button></a>
              <a href="{{route('employee.create',['status' => 'tkk'])}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> TKK</button></a>
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
                          <div class="alert alert-success">
                              <p>{{ \Session::get('success') }}</p>
                          </div><br />
                          @endif
                          <div class="card-body collapse in">
                              <div class="card-block card-dashboard">
                                  <p class="card-text">Data pegawai PNS dan Non PNS dilingkungan RSUD Kesehatan Kerja Provinsi Jawa Barat.</p>
                                  <table class="table table-striped table-bordered zero-configuration">
                                      <thead>
                                          <tr>
                                              <th width="5%">NIP</th>
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
                                              <td>{{$employee->nip}}</td>
                                              <td>{{$employee->nama_lengkap}}</td>
                                              <td>{{$employee->unit_kerja}}</td>
                                              <td>@if($employee->status_pns == 0)
                                                  {{'TKK'}}
                                                  @else
                                                  {{'PNS'}}
                                                  @endif
                                              </td>
                                              <td><center><a href="{{route('employee.create', ['id' => $employee->id, 'do' => 'detail'])}}" class="btn btn-sm btn-primary">Detail</a>
                                                  <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                  <a href="" class="btn btn-sm btn-danger">Hapus</a></center></td>
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
@endsection