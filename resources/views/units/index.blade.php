@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Master Unit Kerja</h3>{{ Route::currentRouteName()}}

            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Unit Kerja
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-6 col-xs-12">
            <div class="form-group"> 
              <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#success">
								<i class="ft-plus"></i> Unit Kerja
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
                              <h4 class="card-title">Unit Kerja RSKK</h4>
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
                                  <table class="table table-striped table-bordered zero-configuration">
                                      <thead>
                                          <tr>
                                              <th width="5%">No</th>
                                              <th>Nama Unit</th>
                                              <th><center>Detail</center></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      	  <?php $no = 1; ?>
                                          @foreach($units as $unit)
                                          <tr>
                                              <td>{{$no++}}</td>
                                              <td>{{$unit->nama_unit}}</td>
                                              <td><center>
																		              <button type="button" class="btn btn-warning btn-sm" data-unit="{{$unit->nama_unit}}" data-uni_id="{{$unit->id}}" data-toggle="modal" data-target="#edit"><i class="ft-edit"></i> Edit</button>
																		              <button type="button" class="btn btn-danger btn-sm" data-unit="{{$unit->nama_unit}}" data-uni_id="{{$unit->id}}" data-toggle="modal" data-target="#delete"><i class="ft-trash"></i> Delete</button>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                            	<th>No</th>
                                              <th>Nama Unit</th>
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
<div class="modal fade text-xs-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header bg-success white">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="myModalLabel9"><i class="fa fa-cogs"></i> Tambah Unit Kerja</h4>
	  </div>
	  <form action="{{route('units.store')}}" method="post">
	  {{csrf_field()}}
	  <div class="modal-body">
			@include('units.form')
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
	  <form action="{{route('units.update','edit')}}" method="post">
	  {{method_field('patch')}}
	  {{csrf_field()}}
	  <div class="modal-body">
	  	<input type="hidden" name="id_unit_kerja" id="uni_id" value="">
			@include('units.form')
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
	  <form action="{{route('units.destroy','hapus')}}" method="post">
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
</div>
@endsection

