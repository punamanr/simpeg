@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

 {{-- {{ Route::currentRouteName()}} --}}
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
          <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="media">
                          <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                              <i class="fa fa-institution font-large-2 white"></i>
                          </div>
                          <div class="p-2 bg-gradient-x-primary white media-body">
                              <h5>Total PNS</h5>
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> {{$count_pns}}</h5>
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
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> {{$count_tkk}}</h5>
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
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> {{$count_struktural}}</h5>
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
                              <h5 class="text-bold-400"><i class="fa fa-street-view"></i> {{$count_fungsional}}</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--/ Stats -->

      <!--Product sale & buyers -->
      <div class="row match-height">
          <div class="col-xl-12 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Statistik Pegawai Berdasarkan Jabatan</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>              
                      </div>
                  </div>
              </div>
          </div>

      </div>
      <!--/ Product sale & buyers -->

       <section id="configuration">
            <div class="row">
              <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekapitulasi Jabatan</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in">
  {{--                       <div id="recent-buyers" class="list-group height-300 position-relative">
                            @foreach($update_terbaru_employee->take(10) as $last_update)
                            <a href="#" class="list-group-item list-group-item-action media no-border">
                                <div class="media-left">
                                    <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('assets/images/portrait/small/avatar-s-7.png')}}" alt="Generic placeholder image">
                                    <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="list-group-item-heading">{{$last_update->nama_lengkap}}</h6>
                                    <p class="list-group-item-text"><span class="tag tag-primary">{{$last_update->nip}}</span><span class="tag tag-warning ml-1">{{$last_update->status}}</span></p>
                                </div>
                            </a>
                            @endforeach
                        </div> --}}
                         <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered compact ">
                              <thead class="bg-gradient-x-primary white">
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Qty</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $no = 1;?>
                                @foreach($grafik_jabatan as $rekap)
                                <tr>
                                    <td class="text-truncate text-xs-center">{{$no++}}</td>
                                    <td class="text-truncate"><a href="#">{{$rekap->nama_jabatan}}</a></td>
                                    <td class="text-truncate text-xs-center">{{$rekap->total}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-12">
                <div class="row">
                  <div class="col-xl-12 col-md-12">
                      <div class="card overflow-hidden">
                          <div class="card-body">
                              <div class="media">
                                  <div class="media-left bg-blue-grey bg-lighten-3 p-2 media-middle">
                                      <i class="icon-arrow-up font-large-2 white"></i>
                                  </div>
                                  <div class="media-body p-2">
                                      <h4>Kenaikan Pangkat / Gol</h4>
                                      <span>PNS Fungsional / Umum</span>
                                  </div>
                                  <div class="media-right p-2 media-middle">
                                      <h1 class="primary">0</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-12 col-md-12">
                      <div class="card overflow-hidden">
                          <div class="card-body">
                              <div class="media">
                                  <div class="media-left bg-info bg-accent-3 p-2 media-middle">
                                      <i class="icon-graph font-large-2 white"></i>
                                  </div>
                                  <div class="media-body p-2">
                                      <h4>Kenaikan Gaji Berkala (KGB)</h4>
                                      <span>Per 2 tahun</span>
                                  </div>
                                  <div class="media-right p-2 media-middle">
                                      <h1 class="success">0</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-12 col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="media">
                                  <div class="media-left bg-purple bg-lighten-3 p-2 media-middle">
                                      <i class="icon-graduation font-large-2  white"></i>
                                  </div>
                                  <div class="media-body p-2">
                                      <h4>Pensiun {{date('Y')}}</h4>
                                      <span>Persiapan untuk tahun ini</span>
                                  </div>
                                  <div class="media-right p-2 media-middle">
                                      <h1 class="warning">0</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </section>
        <section>
          <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Struktural RSKK</h4>
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
                                      <th>Pangkat/Gol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($data_struktural as $pejabat)
                                  <tr>
                                      <td class="text-truncate text-xs-center">{{$pejabat->nip}}</td>
                                      <td class="text-truncate"><a href="#">{{$pejabat->nama_lengkap}}</a></td>
                                      <td class="text-truncate">{{$pejabat->nama_jabatan}}</td>
                                      <td class="text-truncate"><span class="tag tag-default tag-info">{{$pejabat->golongan}}</span>-<span class="tag tag-default bg-gradient-x-warning">{{$pejabat->pangkat}}</span></td>
                                  </tr>
                                  @endforeach
                                </tbody>
  {{--                                     <tfoot >
                                    <tr>
                                      <th>NIP</th>
                                      <th>Nama</th>
                                      <th>Jabatan</th>
                                      <th>Pangkat/Gol</th>
                                    </tr>
                                </tfoot> --}}
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
    @foreach($grafik_jabatan as $grafik)
      {
        name: '{{$grafik->kode_jabatan}}',
        data: [{{$grafik->total}},]
      },
    @endforeach
    // {
    //     name: 'Tokyo',
    //     data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4]

    // }, {
    //     name: 'New York',
    //     data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2]

    // }, {
    //     name: 'London',
    //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4]

    // }, {
    //     name: 'Berlin',
    //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6]

    // }
    ]
});
</script>

@endsection