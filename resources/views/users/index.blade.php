@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Data User</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Data User {{Auth::user()->username}}
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-6 col-xs-12">
            <div class="form-group">
              {{-- <a href="{{route('employees.create',['status' => 'pns'])}}"><button type="button" class="btn-icon btn btn-success btn-secondary btn-round"><i class="ft-plus"></i> User PNS</button></a> --}}
              {{-- <a href="{{route('employees.create',['status' => 'tkk'])}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> TKK</button></a> --}}
              <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#tambah_user">
                <i class="ft-plus"></i> User PNS
              </button>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Zero configuration table -->
          <section id="configuration">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">User SIM Kepegawaian</h4>
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
                                  <p class="card-text">Data user pengguna Sistem Informasi Managemen RSUD Kesehatan Kerja Provinsi Jawa Barat.</p>
                                  <table class="table table-striped table-bordered compact">
                                      <thead>
                                          <tr>
                                              <th width="1%">No</th>
                                              <th width="10%">NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Status</th>
                                              <th><center>Action</center></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1;?>
                                          @foreach($users as $user)
                                          <tr>
                                              <td><center>{{$no++}}</center></td>
                                              <td disabled>{{$user->nip}}</td>
                                              <td>{{$user->name}}</td>
                                              <td><center>{{$user->status}}</center></td>
                                              <td><center>
                                                  <button type="button" {{ ($user->status == 'superadmin') ? 'disabled' : '' }} class="btn btn-warning btn-sm" data-nama="{{$user->name}}" data-nip="{{$user->nip}}"  data-peg_id="{{$user->id}}" data-toggle="modal" data-target="#edit" data-status="{{$user->status}}"><i class="fa fa-pencil"></i> Edit</button>
                                                  <button type="button" {{ ($user->status == 'superadmin') ? 'disabled' : '' }} class="btn btn-danger btn-sm" data-nama="{{$user->name}}" data-nip="{{$user->nip}}"  data-peg_id="{{$user->id}}" data-toggle="modal" data-target="#delete"><i class="ft-trash"></i> Delete</button>
                                                  </center>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>No</th>
                                              <th>NIP</th>
                                              <th>Nama Lengkap</th>
                                              <th>Status</th>
                                              <th>Action</th>
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

<div class="modal fade text-xs-left" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
	  <div class="modal-header bg-success white">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="myModalLabel9"><i class="fa fa-user"></i> Register User PNS</h4>
	  </div>
	  <form action="{{route('users.store')}}" method="post">
	  {{csrf_field()}}
	  <div class="modal-body">
			@include('users.form')
	  </div>
	  <div class="modal-footer">
			<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-outline-success">Simpan</button>
	  </div>
		</form>
	</div>
  </div>
</div>

<!-- Modal Update-->
<div class="modal fade text-xs-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header bg-warning white">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel9"><i class="fa fa-pencil-square-o"></i> Edit User</h4>
    </div>
    <form action="{{route('users.update','edit')}}" method="post">
    {{method_field('patch')}}
    {{csrf_field()}}
    <div class="modal-body">
      <input type="hidden" name="id_user" id="id_user" value="">
      @include('users.edit')
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
    <form action="{{route('employees.destroy','destroy')}}" method="post">
    {{method_field('delete')}}
    {{csrf_field()}}
    <div class="modal-body">
      <div class="form-group">
        <p>Apakah Anda yakin akan menghapus data user ini? </p>
        <input type="hidden" name="id_user" id="id_user" value="">
        <input type="text" name="nama_user" class="form-control" id="nama_user" disabled="disabled">
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
