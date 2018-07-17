@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-body"><!-- Zero configuration table -->

      <!-- stats with icon, subtitle & bg gradient color section start -->
      <section id="stats-icon-subtitle-bg">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h4 class="text-uppercase">Tunjangan BPJS Kesehatan &amp; Ketenagakerjaan</h4>
                <p>Setting besaran persentase BPJS yang harus dibayar RSKK sebagai pemberi kerja dan TKK sebagai penerima upah.</p>
            </div>
            <div class="content-header-right text-md-right col-md-6 col-xs-12">
              <div class="form-group"> 
                <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#edit" data-id="{{$data->id}}" data-tunjangan_jht="{{$tunjangan_jht}}" data-tunjangan_jkk="{{$tunjangan_jkk}}" data-tunjangan_jp="{{$tunjangan_jp}}" data-tunjangan_jk="{{$tunjangan_jk}}" data-potongan_peg_ketenagakerjaan="{{$potongan_peg_ketenagakerjaan}}" data-potongan_peg_kesehatan="{{$potongan_peg_kesehatan}}" data-tunjangan_kesehatan="{{$tunjangan_kesehatan}}">
                  <i class="ft-plus"></i> Edit Master
                </button>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-xl-6 col-md-12">
                  <div class="card overflow-hidden">
                      <div class="card-body">
                          <div class="media bg-gradient-x-primary white">
                              <div class="media-left p-2 media-middle">
                                  <i class="fa fa-building-o font-large-2 white"></i>
                              </div>
                              <div class="media-body p-2">
                                  <h4>BPJS Ketenagakerjaan</h4>
                                  <span>Pemberi Kerja (RSKK)</span>
                              </div>
                              <div class="media-right p-2 media-middle">
                                  <h1>{{$tunjangan_ketenagakerjaan}}%</h1>
{{--                                   {{$data->tunjangan_jht}}
 --}}                         </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-6 col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="media bg-gradient-x-warning white">
                              <div class="media-left p-2 media-middle">
                                  <i class="fa fa-hospital-o font-large-2 white"></i>
                              </div>
                              <div class="media-body p-2">
                                  <h4>BPJS Kesehatan</h4>
                                  <span>Pemberi Kerja (RSKK)</span>
                              </div>
                              <div class="media-right p-2 media-middle">
                                  <h1>{{$tunjangan_kesehatan}}%</h1>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-xl-6 col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="media bg-gradient-x-danger white">
                              <div class="media-right p-2 media-middle">
                                  <i class="fa fa-users font-large-2 white"></i>
                              </div>
                              <div class="media-body p-2">
                                  <h4>BPJS Ketenagakerjaan</h4>
                                  <span>Penerima Upah (TKK)</span>
                              </div>
                              <div class="media-left p-2 media-middle">
                                  <h1>{{$potongan_peg_ketenagakerjaan}}%</h1>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-6 col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="media bg-gradient-x-success white">
                              <div class="media-right p-2 media-middle">
                                  <i class="fa fa-medkit font-large-2 white"></i>
                              </div>
                              <div class="media-body p-2">
                                  <h4>BPJS Kesehatan</h4>
                                  <span>Penerima Upah (TKK)</span>
                              </div>
                              <div class="media-left p-2 media-middle">
                                  <h1>{{$potongan_peg_kesehatan}}%</h1>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="bs-callout-blue-grey callout-border-right mt-1 p-1">
            <strong>Informasi : </strong>
            <p>BPJS Ketenagakerjaan meliputi 4 manfaat yaitu Jaminan Hari Tua (JHT), Jaminan Kecelakaan Kerja (JKK),  Jaminan Pensiun (JP) dan Jaminan Kematian (JK). Nilai Persentasi diatas adalah hasil gabungan dari 4 manfaat tersebut.</p>
          </div>
      </section>
      <!-- // stats with icon, subtitle & bg gradient color section end -->

    </div>
  </div>
</div>

<!-- Modal Update-->
<div class="modal fade text-xs-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-warning white">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel9"><i class="fa fa-pencil-square-o"></i> Edit Persentasi BPJS</h4>
    </div>
    <form action="{{route('bpjs_masters.update','edit')}}" method="post">
    {{method_field('patch')}}
    {{csrf_field()}}
    <div class="modal-body">
      <input type="hidden" name="id_bpjs" id="id" value="">
      @include('bpjs_masters.form')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-outline-warning">Simpan Perubahan</button>
    </div>
    </form>
  </div>
  </div>
</div>

@endsection