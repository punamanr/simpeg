@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Data Kontrak Kerja</h3>{{-- {{ Route::currentRouteName()}} --}}

            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Kontrak Kerja
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-6 col-xs-12">
            <div class="form-group">
{{--               <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#success">
                <i class="ft-plus"></i> Kontrak Kerja
              </button> --}}
              <a href="{{route('agreements.create')}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> Buat Kontrak</button></a>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Zero configuration table -->
          <section id="configuration">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">LIST KONTRAK</h4>
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
                                  <table class="table table-striped table-bordered compact">
                                      <thead>
                                          <tr>
                                              <th width="3%">No</th>
                                              <th>Nomor Kontrak</th>
                                              <th>NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Tahun</th>
                                              <th>Status</th>
                                              <th><center>Detail</center></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1; ?>
                                          @foreach($agreements as $agree)
                                          <tr>
                                              <td><center>{{$no++}}</center></td>
                                              <td><center>{{$agree->no_sk}}</center></td>
                                              <td><center>{{$agree->nip}}</center></td>
                                              <td> {{$agree->nama_lengkap}}</td>
                                              <td><center>{{substr($agree->tgl_awal_kontrak,0,4)}}</center></td>
                                              <td></td>
                                              <td><center>
                                                  <button type="button" class="btn btn-warning btn-sm" data-unit="{{$agree->no_sk}}" data-uni_id="{{$agree->id}}" data-toggle="modal" data-target="#edit"><i class="ft-edit"></i> Edit</button>
                                                  <button type="button" class="btn btn-danger btn-sm" data-unit="{{$agree->no_sk}}" data-uni_id="{{$agree->id}}" data-toggle="modal" data-target="#delete"><i class="ft-trash"></i> Delete</button>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th width="3%">No</th>
                                              <th>Nomor Kontrak</th>
                                              <th>NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Tahun</th>
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

<!-- Modal -->
{{-- <div class="modal fade text-xs-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header bg-success white">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel9"><i class="fa fa-cogs"></i> Tambah Kontrak Kerja</h4>
    </div>
    <form action="{{route('agreements.store')}}" method="post">
    {{csrf_field()}}
    <div class="modal-body">
      @include('agreements.form')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-outline-success">Simpan</button>
    </div>
    </form>
  </div>
  </div>
</div>

<div class="modal fade text-xs-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-warning white">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel9"><i class="fa fa-pencil-square-o"></i> Edit Unit Kerja</h4>
    </div>
    <form action="{{route('agreements.update','edit')}}" method="post">
    {{method_field('patch')}}
    {{csrf_field()}}
    <div class="modal-body">
      <input type="hidden" name="id_unit_kerja" id="uni_id" value="">
      @include('agreements.form')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-outline-warning">Simpan Perubahan</button>
    </div>
    </form>
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
    <form action="{{route('agreements.destroy','hapus')}}" method="post">
    {{method_field('delete')}}
    {{csrf_field()}}
    <div class="modal-body">
      <div class="form-group">
        <p>Apakah Anda yakin akan menghapus unit kerja ini? </p>
        <input type="hidden" name="id_unit_kerja" id="uni_id" value="">
        <input type="text" name="nama_unit" class="form-control" id="nama_unit" disabled="disabled">

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-danger">Ya, Hapus</button>
    </div>
    </form>
  </div>
  </div>
</div> --}}
@endsection
