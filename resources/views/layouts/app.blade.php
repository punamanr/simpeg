<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Sistem Kepegawaian - RSUD Kesehatan Kerja Provinsi Jawa Barat' }}</title>
    <link href="{{ asset('image/icon/favicon.ico') }}" rel='shortcut icon'>

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/pace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/morris.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/timeline.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">
<!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand"
              ><img alt="stack admin logo" src="{{asset('assets/images/logo/logo_jabar_small.png')}}" class="brand-logo">

                <h2 class="brand-text">SIMPEG</h2></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
              <li class="nav-item nav-search"><a href="#" class="nav-link nav-link-search"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input type="text" placeholder="Explore Stack..." class="input">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              {{-- <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-bell"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have new order!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading red darken-1">99% Server load</h6>
                          <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                          <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Complete the task</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Generate monthly report</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-mail"></i><span class="tag tag-pill tag-default tag-warning tag-default tag-up">3</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-warning float-xs-right m-0">4 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{asset('assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="{{asset('assets/images/portrait/small/avatar-s-2.png')}}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{asset('assets/images/portrait/small/avatar-s-3.png')}}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="{{asset('assets/images/portrait/small/avatar-s-6.png')}}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                </ul>
              </li> --}}
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{asset('assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- SIDEBAR MENU -->

    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" navigation-header"><span>MENU</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
          </li>
          <li class="{{ set_active('home') }}"><a href="{{ url('/home') }}" class="menu-item"><i class="ft-home"></i>Dashboard</a></li>
          <li class="{{ set_active('employees.index') }}"><a href="{{ url('/employees/') }}" class="menu-item"><i class="ft-user"></i>Data Karyawan</a></li>
          <li class="{{ set_active('agreements.index') }}"><a href="{{ url('/agreements/') }}" class="menu-item"><i class="fa fa-book"></i>Data Kontrak Kerja</a></li>
          <li class="{{ set_active('bpjs.index') }}"><a href="{{ url('/bpjs/') }}" class="menu-item"><i class="fa fa-medkit"></i>BPJS TKK</a></li>
          <li><a href="#" class="menu-item"><i class="fa fa-cubes"></i>History</a>
            <ul class="menu-content">
              <li class=""><a href="" class="menu-item"> Gaji Berkala</a>
              </li>
              <li class=""><a href="" class="menu-item">Pangkat & Golongan</a>
              <li class=""><a href="" class="menu-item">Seminar & Pelatihan</a>
              </li>
              <li class=""><a href="" class="menu-item">Pendidikan</a>
              </li>
            </ul>
          </li>
{{--           <li class="{{ set_active('units.index') }}"><a href="{{ url('/units/') }}" class="menu-item"><i class="ft-layers"></i>Master Unit Kerja</a></li> --}}
          <li><a href="#" class="menu-item"><i class="ft-layers"></i>Master</a>
            <ul class="menu-content">
              <li class="{{ set_active('units.index') }}"><a href="{{ url('/units/') }}" class="menu-item">Unit Kerja</a>
              </li>
              <li class="{{ set_active('pangkatgolongans.index') }}"><a href="{{ url('/pangkatgolongans/') }}" class="menu-item">Pangkat Golongan</a>
              </li>
              <li class="{{ set_active('religions.index') }}"><a href="{{ url('/religions/') }}" class="menu-item">Agama</a>
              </li>
              <li class="{{ set_active('positions.index') }}"><a href="{{ url('/positions/') }}" class="menu-item">Jabatan</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- isi konten -->
    @yield('content')
    <!-- end isi konten-->
    
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">RSUD KESEHATAN KERJA PROVINSI JAWA BARAT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block hidden-md-down">IT Dept</span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <?php if(Route::currentRouteName() == 'home') {?>
    <script src="{{asset('assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>
    <?php } ?>
    <script src="{{asset('assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    {{-- js untuk modal unit kerja  --}}
    @if(Route::currentRouteName() == 'units.index')
    <script type="text/javascript">
    $('#edit').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var uni_id = button.data('uni_id')
      var nama_unit = button.data('unit')
      var modal = $(this)
      
      modal.find('.modal-body #uni_id').val(uni_id);
      modal.find('.modal-body #nama_unit').val(nama_unit);

    })

    $('#delete').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var uni_id = button.data('uni_id')
      var nama_unit = button.data('unit')
      var modal = $(this)
      
      modal.find('.modal-body #uni_id').val(uni_id);
      modal.find('.modal-body #nama_unit').val(nama_unit);

    })
    </script>
    @endif

    {{-- js untuk modal agama --}}
    @if(Route::currentRouteName() == 'religions.index')
    <script type="text/javascript">
    $('#delete').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var agm_id = button.data('agm_id')
      var nama_agama = button.data('agama')
      var modal = $(this)
      
      modal.find('.modal-body #agm_id').val(agm_id);
      modal.find('.modal-body #nama_agama').val(nama_agama);

    })
    </script>
    @endif

    {{-- js untuk modal pangkat dan golongan --}}
    @if(Route::currentRouteName() == 'pangkatgolongans.index')
    <script type="text/javascript">
    $('#edit').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var uni_id = button.data('uni_id')
      var pang = button.data('pangkat')
      var gol = button.data('golongan')
      var modal = $(this)
      
      modal.find('.modal-body #uni_id').val(uni_id);
      modal.find('.modal-body #pangkat').val(pang);
      modal.find('.modal-body #golongan').val(gol);
    })

    $('#delete').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var uni_id = button.data('uni_id')
      var modal = $(this)
      
      modal.find('.modal-body #uni_id').val(uni_id);
    })
    </script>
    @endif

    {{-- js untuk modal master jabatan  --}}
    @if(Route::currentRouteName() == 'positions.index')
    <script type="text/javascript">
    $('#edit').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var pos_id = button.data('pos_id')
      var kode_jabatan = button.data('kode_jabatan')
      var nama_jabatan = button.data('position')
      var modal = $(this)
      
      modal.find('.modal-body #pos_id').val(pos_id);
      modal.find('.modal-body #nama_jabatan').val(nama_jabatan);
      modal.find('.modal-body #kode_jabatan').val(kode_jabatan);
    })

    $('#delete').on('show.bs.modal', function (event) {
      // console.log('Modal Opened');

      var button = $(event.relatedTarget)
      var pos_id = button.data('pos_id')
      var nama_jabatan = button.data('position')
      var modal = $(this)
      
      modal.find('.modal-body #pos_id').val(pos_id);
      modal.find('.modal-body #nama_jabatan').val(nama_jabatan);

    })
    </script>
    @endif

    {{-- js untuk modal delete data karyawan  --}}
    @if(Route::currentRouteName() == 'employees.index')
    <script type="text/javascript">
    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var peg_id = button.data('peg_id')
      var nama_pegawai = button.data('nama')
      var nip = button.data('nip')
      var modal = $(this)

      modal.find('.modal-body #peg_id').val(peg_id);
      modal.find('.modal-body #nama_pegawai').val(nip+" - "+nama_pegawai);

    })
    </script>
    @endif
</body>
</html>