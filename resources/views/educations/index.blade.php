@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

 {{-- {{ Route::currentRouteName()}} --}}
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
{{--       <div class="row">
          <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                              <i class="fa fa-institution font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-primary white media-body">
                              <h5>Total PNS</h5>
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> 1</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                              <i class="fa fa-group font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-danger white media-body">
                              <h5>Total TKK</h5>
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> 2</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                              <i class="fa fa-user-secret font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-warning white media-body">
                              <h5>Struktural</h5>
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> 3</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                              <i class="fa fa-user-md font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-success white media-body">
                              <h5>Fungsional</h5>
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> 4</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> --}}
      <!--/ Stats -->
      
      <a href="{{route('educations.create')}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> Tambah Dokumen</button></a>
      <br><br>
      <!--Product sale & buyers -->
{{--       <div class="row match-height">
          <div class="col-xl-6 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Statistik Pegawai Berdasarkan Pendidikan</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>              
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Statistik Pegawai Berdasarkan Jabatan</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>              
                      </div>
                  </div>
              </div>
          </div>

      </div> --}}
      <!--/ Product sale & buyers -->

        <section>
          <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Rekapitulasi Pendidikan Pegawai RSKK</h4>
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
                            <table class="table table-striped table-bordered compact ">
                                <thead class="bg-gradient-x-primary white">
                                    <tr>
                                      <th>NIP</th>
                                      <th>Nama</th>
                                      <th>Jabatan</th>
                                      <th width="5%">Status Pegawai</th>
                                      <th width="5%">Pendidikan</th>

                                      <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pendidikan as $data)
                                    <?php 
                                      // Jenjang Pendidikan
                                      if($data->pendidikan == 'S1')
                                      {
                                        $jenjang_pendidikan = 'Sarjana';
                                      }
                                      elseif ($data->pendidikan == 'S2') 
                                      {
                                        $jenjang_pendidikan = 'Magister';
                                      }
                                      elseif ($data->pendidikan == 'S3') 
                                      {
                                        $jenjang_pendidikan = 'Doktor';
                                      }
                                      else
                                      {
                                        $jenjang_pendidikan = $data->pendidikan;
                                      }
                                      
                                      // Status PNS atau TKK
                                      if($data->status_pns == 0)
                                      {
                                        $status_pns = 'TKK';
                                      }
                                      else
                                      {
                                        $status_pns = 'PNS';
                                      }
                                    ?>

                                  <tr>
                                      <td class="text-truncate">{{$data->nip}}</td>
                                      <td class="text-truncate">{{$data->nama_lengkap}}</td>
                                      <td class="text-truncate">{{$data->nama_jabatan}}</td>
                                      <td class="text-truncate">{{$status_pns}}</td>
                                      <td class="text-truncate">{{$jenjang_pendidikan}} ({{$data->pendidikan}})</td>
                                      <td class="text-truncate text-xs-center">
                                        <a href="{{ route('educations.edit', $data->nip) }}" class="btn btn-info btn-sm"><i class="ft-book"></i> Detail</a>
                                      </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>

<script type="text/javascript">
  
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'FORMASI JABATAN'
    },
    subtitle: {
        text: 'RSUD KESEHATAN KERJA PROVINSI JAWA BARAT'
    },
    xAxis: {
        categories: [
            'Tahun 2018'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah (qty)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} org</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [
    
    ]
});
</script>

@endsection