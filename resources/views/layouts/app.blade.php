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
          <li class="{{ set_active('employee.index') }}"><a href="{{ url('/employee/index') }}" class="menu-item"><i class="ft-user"></i>Data Karyawan</a></li>
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
            </ul>
          </li>
<!--           <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span data-i18n="" class="menu-title">Templates</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Vertical</a>
                <ul class="menu-content">
                  <li><a href="../vertical-modern-menu-template" class="menu-item">Modern Menu</a>
                  </li>
                  <li><a href="../vertical-menu-template" class="menu-item">Semi Light</a>
                  </li>
                  <li><a href="../vertical-menu-template-semi-dark" class="menu-item">Semi Dark</a>
                  </li>
                  <li><a href="../vertical-menu-template-nav-dark" class="menu-item">Nav Dark</a>
                  </li>
                  <li><a href="../vertical-menu-template-light" class="menu-item">Light</a>
                  </li>
                  <li><a href="../vertical-overlay-menu-template" class="menu-item">Overlay Menu</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Horizontal</a>
                <ul class="menu-content">
                  <li><a href="../horizontal-menu-template" class="menu-item">Classic</a>
                  </li>
                  <li><a href="../horizontal-menu-template-nav" class="menu-item">Nav Dark</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-layout"></i><span data-i18n="" class="menu-title">Layouts</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Page Layouts</a>
                <ul class="menu-content">
                  <li><a href="layout-1-column.html" class="menu-item">1 column</a>
                  </li>
                  <li><a href="layout-2-columns.html" class="menu-item">2 columns</a>
                  </li>
                  <li><a href="#" class="menu-item">Content Det. Sidebar</a>
                    <ul class="menu-content">
                      <li><a href="layout-content-detached-left-sidebar.html" class="menu-item">Detached left sidebar</a>
                      </li>
                      <li><a href="layout-content-detached-left-sticky-sidebar.html" class="menu-item">Detached sticky left sidebar</a>
                      </li>
                      <li><a href="layout-content-detached-right-sidebar.html" class="menu-item">Detached right sidebar</a>
                      </li>
                      <li><a href="layout-content-detached-right-sticky-sidebar.html" class="menu-item">Detached sticky right sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a href="layout-fixed-navbar.html" class="menu-item">Fixed navbar</a>
                  </li>
                  <li><a href="layout-fixed-navigation.html" class="menu-item">Fixed navigation</a>
                  </li>
                  <li><a href="layout-fixed-navbar-navigation.html" class="menu-item">Fixed navbar &amp; navigation</a>
                  </li>
                  <li><a href="layout-fixed-navbar-footer.html" class="menu-item">Fixed navbar &amp; footer</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a href="layout-fixed.html" class="menu-item">Fixed layout</a>
                  </li>
                  <li><a href="layout-boxed.html" class="menu-item">Boxed layout</a>
                  </li>
                  <li><a href="layout-static.html" class="menu-item">Static layout</a>
                  </li>
                  <li class="navigation-divider"></li>
                  <li><a href="layout-light.html" class="menu-item">Light layout</a>
                  </li>
                  <li><a href="layout-dark.html" class="menu-item">Dark layout</a>
                  </li>
                  <li><a href="layout-semi-dark.html" class="menu-item">Semi dark layout</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Navbars</a>
                <ul class="menu-content">
                  <li><a href="navbar-light.html" class="menu-item">Navbar Light</a>
                  </li>
                  <li><a href="navbar-dark.html" class="menu-item">Navbar Dark</a>
                  </li>
                  <li><a href="navbar-semi-dark.html" class="menu-item">Navbar Semi Dark</a>
                  </li>
                  <li><a href="navbar-brand-center.html" class="menu-item">Brand Center</a>
                  </li>
                  <li><a href="navbar-fixed-top.html" class="menu-item">Fixed Top</a>
                  </li>
                  <li><a href="#" class="menu-item">Hide on Scroll</a>
                    <ul class="menu-content">
                      <li><a href="navbar-hide-on-scroll-top.html" class="menu-item">Hide on Scroll Top</a>
                      </li>
                      <li><a href="navbar-hide-on-scroll-bottom.html" class="menu-item">Hide on Scroll Bottom</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="navbar-components.html" class="menu-item">Navbar Components</a>
                  </li>
                  <li><a href="navbar-styling.html" class="menu-item">Navbar Styling</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Vertical Nav</a>
                <ul class="menu-content">
                  <li><a href="#" class="menu-item">Navigation Types</a>
                    <ul class="menu-content">
                      <li><a href="../vertical-menu-template" class="menu-item">Vertical Menu</a>
                      </li>
                      <li><a href="../vertical-overlay-menu-template" class="menu-item">Vertical Overlay</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="vertical-nav-compact-menu.html" class="menu-item">Compact Menu</a>
                  </li>
                  <li><a href="vertical-nav-fixed.html" class="menu-item">Fixed Navigation</a>
                  </li>
                  <li><a href="vertical-nav-static.html" class="menu-item">Static Navigation</a>
                  </li>
                  <li><a href="vertical-nav-light.html" class="menu-item">Navigation Light</a>
                  </li>
                  <li><a href="vertical-nav-dark.html" class="menu-item">Navigation Dark</a>
                  </li>
                  <li><a href="vertical-nav-accordion.html" class="menu-item">Accordion Navigation</a>
                  </li>
                  <li><a href="vertical-nav-collapsible.html" class="menu-item">Collapsible Navigation</a>
                  </li>
                  <li><a href="vertical-nav-flipped.html" class="menu-item">Flipped Navigation</a>
                  </li>
                  <li><a href="vertical-nav-native-scroll.html" class="menu-item">Native scroll</a>
                  </li>
                  <li><a href="vertical-nav-right-side-icon.html" class="menu-item">Right side icons</a>
                  </li>
                  <li><a href="vertical-nav-bordered.html" class="menu-item">Bordered Navigation</a>
                  </li>
                  <li><a href="vertical-nav-disabled-link.html" class="menu-item">Disabled Navigation</a>
                  </li>
                  <li><a href="vertical-nav-styling.html" class="menu-item">Navigation Styling</a>
                  </li>
                  <li><a href="vertical-nav-tags-pills.html" class="menu-item">Tags &amp; Pills</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Horizontal Nav</a>
                <ul class="menu-content">
                  <li><a href="#" class="menu-item">Navigation Types</a>
                    <ul class="menu-content">
                      <li><a href="../horizontal-menu-template" class="menu-item">Classic</a>
                      </li>
                      <li><a href="../horizontal-menu-template-nav" class="menu-item">Nav Dark</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Page Headers</a>
                <ul class="menu-content">
                  <li><a href="headers-breadcrumbs-basic.html" class="menu-item">Breadcrumbs basic</a>
                  </li>
                  <li><a href="headers-breadcrumbs-top.html" class="menu-item">Breadcrumbs top</a>
                  </li>
                  <li><a href="headers-breadcrumbs-bottom.html" class="menu-item">Breadcrumbs bottom</a>
                  </li>
                  <li><a href="headers-breadcrumbs-with-button.html" class="menu-item">Breadcrumbs with button</a>
                  </li>
                  <li><a href="headers-breadcrumbs-with-round-button.html" class="menu-item">Breadcrumbs with round button 2</a>
                  </li>
                  <li><a href="headers-breadcrumbs-with-stats.html" class="menu-item">Breadcrumbs with stats</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Footers</a>
                <ul class="menu-content">
                  <li><a href="footer-light.html" class="menu-item">Footer Light</a>
                  </li>
                  <li><a href="footer-dark.html" class="menu-item">Footer Dark</a>
                  </li>
                  <li><a href="footer-transparent.html" class="menu-item">Footer Transparent</a>
                  </li>
                  <li><a href="footer-fixed.html" class="menu-item">Footer Fixed</a>
                  </li>
                  <li><a href="footer-components.html" class="menu-item">Footer Components</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-zap"></i><span data-i18n="" class="menu-title">Starter kit</span><span class="tag tag tag-danger tag-pill float-xs-right mr-2">New</span></a>
            <ul class="menu-content">
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-1-column.html" class="menu-item">1 column</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-2-columns.html" class="menu-item">2 columns</a>
              </li>
              <li><a href="#" class="menu-item">Content Det. Sidebar</a>
                <ul class="menu-content">
                  <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-content-detached-left-sidebar.html" class="menu-item">Detached left sidebar</a>
                  </li>
                  <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-content-detached-left-sticky-sidebar.html" class="menu-item">Detached sticky left sidebar</a>
                  </li>
                  <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-content-detached-right-sidebar.html" class="menu-item">Detached right sidebar</a>
                  </li>
                  <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-content-detached-right-sticky-sidebar.html" class="menu-item">Detached sticky right sidebar</a>
                  </li>
                </ul>
              </li>
              <li class="navigation-divider"></li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-fixed-navbar.html" class="menu-item">Fixed navbar</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-fixed-navigation.html" class="menu-item">Fixed navigation</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-fixed-navbar-navigation.html" class="menu-item">Fixed navbar &amp; navigation</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-fixed-navbar-footer.html" class="menu-item">Fixed navbar &amp; footer</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-fixed.html" class="menu-item">Fixed layout</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-boxed.html" class="menu-item">Boxed layout</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-static.html" class="menu-item">Static layout</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-light.html" class="menu-item">Light layout</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-dark.html" class="menu-item">Dark layout</a>
              </li>
              <li><a href="../../../starter-kit/ltr/vertical-menu-template-nav-dark/layout-semi-dark.html" class="menu-item">Semi dark layout</a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>Apps</span><i data-toggle="tooltip" data-placement="right" data-original-title="Apps" class=" ft-minus"></i>
          </li>
          <li class=" nav-item"><a href="email-application.html"><i class="ft-mail"></i><span data-i18n="" class="menu-title">Email Application</span></a>
          </li>
          <li class=" nav-item"><a href="chat-application.html"><i class="ft-message-square"></i><span data-i18n="" class="menu-title">Chat Application</span></a>
          </li>
          <li class=" nav-item"><a href="project-summary.html"><i class="ft-airplay"></i><span data-i18n="" class="menu-title">Project Summary</span></a>
          </li>
          <li class=" nav-item"><a href="invoice-template.html"><i class="ft-printer"></i><span data-i18n="" class="menu-title">Invoice Template</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-share"></i><span data-i18n="" class="menu-title">Timelines</span></a>
            <ul class="menu-content">
              <li><a href="timeline-center.html" class="menu-item">Timelines Center</a>
              </li>
              <li><a href="timeline-horizontal.html" class="menu-item">Timelines Horizontal</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-user"></i><span data-i18n="" class="menu-title">Users</span></a>
            <ul class="menu-content">
              <li><a href="user-profile.html" class="menu-item">Users Profile</a>
              </li>
              <li><a href="user-cards.html" class="menu-item">Users Cards</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-plus-square"></i><span data-i18n="" class="menu-title">Calender</span></a>
            <ul class="menu-content">
              <li><a href="full-calender-basic.html" class="menu-item">Full Calender Basic</a>
              </li>
              <li><a href="full-calender-events.html" class="menu-item">Full Calender Events</a>
              </li>
              <li><a href="full-calender-advance.html" class="menu-item">Full Calender Advance</a>
              </li>
              <li><a href="full-calender-extra.html" class="menu-item">Full Calender Extra</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-image"></i><span data-i18n="" class="menu-title">Gallery</span></a>
            <ul class="menu-content">
              <li><a href="gallery-grid.html" class="menu-item">Gallery Grid</a>
              </li>
              <li><a href="gallery-grid-with-desc.html" class="menu-item">Gallery Grid with Desc</a>
              </li>
              <li><a href="gallery-masonry.html" class="menu-item">Masonry Gallery</a>
              </li>
              <li><a href="gallery-masonry-with-desc.html" class="menu-item">Masonry Gallery with Desc</a>
              </li>
              <li><a href="gallery-hover-effects.html" class="menu-item">Hover Effects</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-search"></i><span data-i18n="" class="menu-title">Search</span></a>
            <ul class="menu-content">
              <li><a href="search-page.html" class="menu-item">Search Page</a>
              </li>
              <li><a href="search-website.html" class="menu-item">Search Website</a>
              </li>
              <li><a href="search-images.html" class="menu-item">Search Images</a>
              </li>
              <li><a href="search-videos.html" class="menu-item">Search Videos</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-unlock"></i><span data-i18n="" class="menu-title">Authentication</span></a>
            <ul class="menu-content">
              <li><a href="login-simple.html" class="menu-item">Login Simple</a>
              </li>
              <li><a href="login-with-bg.html" class="menu-item">Login with Bg</a>
              </li>
              <li><a href="login-with-bg-image.html" class="menu-item">Login with Bg Image</a>
              </li>
              <li><a href="register-simple.html" class="menu-item">Register Simple</a>
              </li>
              <li><a href="register-with-bg.html" class="menu-item">Register with Bg</a>
              </li>
              <li><a href="register-with-bg-image.html" class="menu-item">Register with Bg Image</a>
              </li>
              <li><a href="unlock-user.html" class="menu-item">Unlock User</a>
              </li>
              <li><a href="recover-password.html" class="menu-item">Recover Password</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-alert-triangle"></i><span data-i18n="" class="menu-title">Error</span></a>
            <ul class="menu-content">
              <li><a href="error-400.html" class="menu-item">Error 400</a>
              </li>
              <li><a href="error-401.html" class="menu-item">Error 401</a>
              </li>
              <li><a href="error-403.html" class="menu-item">Error 403</a>
              </li>
              <li><a href="error-404.html" class="menu-item">Error 404</a>
              </li>
              <li><a href="error-500.html" class="menu-item">Error 500</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-watch"></i><span data-i18n="" class="menu-title">Coming Soon</span></a>
            <ul class="menu-content">
              <li><a href="coming-soon-flat.html" class="menu-item">Flat</a>
              </li>
              <li><a href="coming-soon-bg-image.html" class="menu-item">Bg image</a>
              </li>
              <li><a href="coming-soon-bg-video.html" class="menu-item">Bg video</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="under-maintenance.html"><i class="ft-cloud-off"></i><span data-i18n="" class="menu-title">Maintenance</span></a>
          </li>
          <li class=" navigation-header"><span>UI</span><i data-toggle="tooltip" data-placement="right" data-original-title="UI" class="ft-droplet ft-minus"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-globe"></i><span data-i18n="" class="menu-title">Content</span></a>
            <ul class="menu-content">
              <li><a href="content-grid.html" class="menu-item">Grid</a>
              </li>
              <li><a href="content-typography.html" class="menu-item">Typography</a>
              </li>
              <li><a href="content-text-utilities.html" class="menu-item">Text utilities</a>
              </li>
              <li><a href="content-syntax-highlighter.html" class="menu-item">Syntax highlighter</a>
              </li>
              <li><a href="content-helper-classes.html" class="menu-item">Helper classes</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-square"></i><span data-i18n="" class="menu-title">Cards</span><span class="tag tag tag-pill tag-success float-xs-right mr-2">Hot</span></a>
            <ul class="menu-content">
              <li><a href="card-bootstrap.html" class="menu-item">Bootstrap</a>
              </li>
              <li><a href="card-headings.html" class="menu-item">Headings</a>
              </li>
              <li><a href="card-options.html" class="menu-item">Options</a>
              </li>
              <li><a href="card-actions.html" class="menu-item">Action</a>
              </li>
              <li><a href="card-draggable.html" class="menu-item">Draggable</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span data-i18n="" class="menu-title">Advance Cards</span></a>
            <ul class="menu-content">
              <li><a href="card-statistics.html" class="menu-item">Statistics</a>
              </li>
              <li><a href="card-weather.html" class="menu-item">Weather</a>
              </li>
              <li><a href="card-charts.html" class="menu-item">Charts</a>
              </li>
              <li><a href="card-maps.html" class="menu-item">Maps</a>
              </li>
              <li><a href="card-social.html" class="menu-item">Social</a>
              </li>
              <li><a href="card-ecommerce.html" class="menu-item">E-Commerce</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Color Palette</span><span class="tag tag tag-warning tag-pill float-xs-right mr-2">14</span></a>
            <ul class="menu-content">
              <li><a href="color-palette-primary.html" class="menu-item">Primary palette</a>
              </li>
              <li><a href="color-palette-danger.html" class="menu-item">Danger palette</a>
              </li>
              <li><a href="color-palette-success.html" class="menu-item">Success palette</a>
              </li>
              <li><a href="color-palette-warning.html" class="menu-item">Warning palette</a>
              </li>
              <li><a href="color-palette-info.html" class="menu-item">Info palette</a>
              </li>
              <li class="navigation-divider"></li>
              <li><a href="color-palette-red.html" class="menu-item">Red palette</a>
              </li>
              <li><a href="color-palette-pink.html" class="menu-item">Pink palette</a>
              </li>
              <li><a href="color-palette-purple.html" class="menu-item">Purple palette</a>
              </li>
              <li><a href="color-palette-blue.html" class="menu-item">Blue palette</a>
              </li>
              <li><a href="color-palette-cyan.html" class="menu-item">Cyan palette</a>
              </li>
              <li><a href="color-palette-teal.html" class="menu-item">Teal palette</a>
              </li>
              <li><a href="color-palette-yellow.html" class="menu-item">Yellow palette</a>
              </li>
              <li><a href="color-palette-amber.html" class="menu-item">Amber palette</a>
              </li>
              <li><a href="color-palette-blue-grey.html" class="menu-item">Blue Grey palette</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-eye"></i><span data-i18n="" class="menu-title">Icons</span></a>
            <ul class="menu-content">
              <li><a href="icons-feather.html" class="menu-item">Feather</a>
              </li>
              <li><a href="icons-font-awesome.html" class="menu-item">Font Awesome</a>
              </li>
              <li><a href="icons-simple-line-icons.html" class="menu-item">Simple Line Icons</a>
              </li>
              <li><a href="icons-meteocons.html" class="menu-item">Meteocons</a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>Components</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title">Bootstrap Components</span></a>
            <ul class="menu-content">
              <li><a href="component-alerts.html" class="menu-item">Alerts</a>
              </li>
              <li><a href="component-callout.html" class="menu-item">Callout</a>
              </li>
              <li><a href="#" class="menu-item">Buttons</a>
                <ul class="menu-content">
                  <li><a href="component-buttons-basic.html" class="menu-item">Basic Buttons</a>
                  </li>
                  <li><a href="component-buttons-extended.html" class="menu-item">Extended Buttons</a>
                  </li>
                </ul>
              </li>
              <li><a href="component-carousel.html" class="menu-item">Carousel</a>
              </li>
              <li><a href="component-collapse.html" class="menu-item">Collapse</a>
              </li>
              <li><a href="component-dropdowns.html" class="menu-item">Dropdowns</a>
              </li>
              <li><a href="component-list-group.html" class="menu-item">List Group</a>
              </li>
              <li><a href="component-modals.html" class="menu-item">Modals</a>
              </li>
              <li><a href="component-pagination.html" class="menu-item">Pagination</a>
              </li>
              <li><a href="component-navs-component.html" class="menu-item">Navs Component</a>
              </li>
              <li><a href="component-tabs-component.html" class="menu-item">Tabs Component</a>
              </li>
              <li><a href="component-pills-component.html" class="menu-item">Pills Component</a>
              </li>
              <li><a href="component-tooltips.html" class="menu-item">Tooltips</a>
              </li>
              <li><a href="component-popovers.html" class="menu-item">Popovers</a>
              </li>
              <li><a href="component-tags.html" class="menu-item">Tags</a>
              </li>
              <li><a href="component-pill-tags.html" class="menu-item">Pill Tags</a>
              </li>
              <li><a href="component-progress.html" class="menu-item">Progress</a>
              </li>
              <li><a href="component-media-objects.html" class="menu-item">Media Objects</a>
              </li>
              <li><a href="component-scrollable.html" class="menu-item">Scrollable</a>
              </li>
              <li><a href="component-spinners.html" class="menu-item">Spinners</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title">Extra Components</span></a>
            <ul class="menu-content">
              <li><a href="ex-component-sweet-alerts.html" class="menu-item">Sweet Alerts</a>
              </li>
              <li><a href="ex-component-ratings.html" class="menu-item">Ratings</a>
              </li>
              <li><a href="ex-component-toastr.html" class="menu-item">Toastr</a>
              </li>
              <li><a href="ex-component-noui-slider.html" class="menu-item">NoUI Slider</a>
              </li>
              <li><a href="ex-component-knob.html" class="menu-item">Knob</a>
              </li>
              <li><a href="ex-component-block-ui.html" class="menu-item">Block UI</a>
              </li>
              <li><a href="ex-component-date-time-picker.html" class="menu-item">DateTime Picker</a>
              </li>
              <li><a href="ex-component-file-uploader-dropzone.html" class="menu-item">File Uploader</a>
              </li>
              <li><a href="ex-component-image-cropper.html" class="menu-item">Image Cropper</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-edit"></i><span data-i18n="" class="menu-title">Forms</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Form Elements</a>
                <ul class="menu-content">
                  <li><a href="form-inputs.html" class="menu-item">Form Inputs</a>
                  </li>
                  <li><a href="form-input-groups.html" class="menu-item">Input Groups</a>
                  </li>
                  <li><a href="form-input-grid.html" class="menu-item">Input Grid</a>
                  </li>
                  <li><a href="form-extended-inputs.html" class="menu-item">Extended Inputs</a>
                  </li>
                  <li><a href="form-checkboxes-radios.html" class="menu-item">Checkboxes &amp; Radios</a>
                  </li>
                  <li><a href="form-switch.html" class="menu-item">Switch</a>
                  </li>
                  <li><a href="form-select2.html" class="menu-item">Select2</a>
                  </li>
                  <li><a href="form-tags-input.html" class="menu-item">Tags Input</a>
                  </li>
                  <li><a href="form-validation.html" class="menu-item">Validation</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Form Layouts</a>
                <ul class="menu-content">
                  <li><a href="form-layout-basic.html" class="menu-item">Basic Forms</a>
                  </li>
                  <li><a href="form-layout-horizontal.html" class="menu-item">Horizontal Forms</a>
                  </li>
                  <li><a href="form-layout-hidden-labels.html" class="menu-item">Hidden Labels</a>
                  </li>
                  <li><a href="form-layout-form-actions.html" class="menu-item">Form Actions</a>
                  </li>
                  <li><a href="form-layout-bordered.html" class="menu-item">Bordered</a>
                  </li>
                  <li><a href="form-layout-striped-rows.html" class="menu-item">Striped Rows</a>
                  </li>
                </ul>
              </li>
              <li><a href="form-wizard.html" class="menu-item">Form Wizard</a>
              </li>
              <li><a href="form-repeater.html" class="menu-item">Form Repeater</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-grid"></i><span data-i18n="" class="menu-title">Tables</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Bootstrap Tables</a>
                <ul class="menu-content">
                  <li><a href="table-basic.html" class="menu-item">Basic Tables</a>
                  </li>
                  <li><a href="table-border.html" class="menu-item">Table Border</a>
                  </li>
                  <li><a href="table-sizing.html" class="menu-item">Table Sizing</a>
                  </li>
                  <li><a href="table-styling.html" class="menu-item">Table Styling</a>
                  </li>
                  <li><a href="table-components.html" class="menu-item">Table Components</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">DataTables</a>
                <ul class="menu-content">
                  <li><a href="dt-basic-initialization.html" class="menu-item">Basic Initialisation</a>
                  </li>
                  <li><a href="dt-advanced-initialization.html" class="menu-item">Advanced initialisation</a>
                  </li>
                  <li><a href="dt-styling.html" class="menu-item">Styling</a>
                  </li>
                  <li><a href="dt-data-sources.html" class="menu-item">Data Sources</a>
                  </li>
                  <li><a href="dt-api.html" class="menu-item">API</a>
                  </li>
                  <li><a href="#" data-i18n="nav.datatable_extensions.main" class="menu-item">DataTables Ext.</a>
                    <ul class="menu-content">
                      <li><a href="dt-extensions-autofill.html" data-i18n="nav.datatable_extensions.dt_extensions_autofill" class="menu-item">AutoFill</a>
                      </li>
                      <li><a href="#" data-i18n="nav.datatable_extensions.datatable_buttons.main" class="menu-item">Buttons</a>
                        <ul class="menu-content">
                          <li><a href="dt-extensions-buttons-basic.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_basic" class="menu-item">Basic Buttons</a>
                          </li>
                          <li><a href="dt-extensions-buttons-html-5-data-export.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_html_5_data_export" class="menu-item">HTML 5 Data Export</a>
                          </li>
                          <li><a href="dt-extensions-buttons-flash-data-export.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_flash_data_export" class="menu-item">Flash Data Export</a>
                          </li>
                          <li><a href="dt-extensions-buttons-column-visibility.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_column_visibility" class="menu-item">Column Visibility</a>
                          </li>
                          <li><a href="dt-extensions-buttons-print.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_print" class="menu-item">Print</a>
                          </li>
                          <li><a href="dt-extensions-buttons-api.html" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_api" class="menu-item">API</a>
                          </li>
                        </ul>
                      </li>
                      <li><a href="dt-extensions-column-reorder.html" data-i18n="nav.datatable_extensions.dt_extensions_column_reorder" class="menu-item">Column Reorder</a>
                      </li>
                      <li><a href="dt-extensions-fixed-columns.html" data-i18n="nav.datatable_extensions.dt_extensions_fixed_columns" class="menu-item">Fixed Columns</a>
                      </li>
                      <li><a href="dt-extensions-key-table.html" data-i18n="nav.datatable_extensions.dt_extensions_key_table" class="menu-item">Key Table</a>
                      </li>
                      <li><a href="dt-extensions-row-reorder.html" data-i18n="nav.datatable_extensions.dt_extensions_row_reorder" class="menu-item">Row Reorder</a>
                      </li>
                      <li><a href="dt-extensions-select.html" data-i18n="nav.datatable_extensions.dt_extensions_select" class="menu-item">Select</a>
                      </li>
                      <li><a href="dt-extensions-fix-header.html" data-i18n="nav.datatable_extensions.dt_extensions_fix_header" class="menu-item">Fix Header</a>
                      </li>
                      <li><a href="dt-extensions-responsive.html" data-i18n="nav.datatable_extensions.dt_extensions_responsive" class="menu-item">Responsive</a>
                      </li>
                      <li><a href="dt-extensions-column-visibility.html" data-i18n="nav.datatable_extensions.dt_extensions_column_visibility" class="menu-item">Column Visibility</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="table-jsgrid.html" class="menu-item">jsGrid</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span data-i18n="" class="menu-title">Charts</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Echarts</a>
                <ul class="menu-content">
                  <li><a href="echarts-line-area-charts.html" class="menu-item">Line &amp; Area charts</a>
                  </li>
                  <li><a href="echarts-bar-column-charts.html" class="menu-item">Bar &amp; Column charts</a>
                  </li>
                  <li><a href="echarts-pie-doughnut-charts.html" class="menu-item">Pie &amp; Doughnut charts</a>
                  </li>
                  <li><a href="echarts-scatter-charts.html" class="menu-item">Scatter charts</a>
                  </li>
                  <li><a href="echarts-radar-chord-charts.html" class="menu-item">Radar &amp; Chord charts</a>
                  </li>
                  <li><a href="echarts-funnel-gauges-charts.html" class="menu-item">Funnel &amp; Gauges charts</a>
                  </li>
                  <li><a href="echarts-combination-charts.html" class="menu-item">Combination charts</a>
                  </li>
                  <li><a href="echarts-advance-charts.html" class="menu-item">Advance charts</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Chartjs</a>
                <ul class="menu-content">
                  <li><a href="chartjs-line-charts.html" class="menu-item">Line charts</a>
                  </li>
                  <li><a href="chartjs-bar-charts.html" class="menu-item">Bar charts</a>
                  </li>
                  <li><a href="chartjs-pie-doughnut-charts.html" class="menu-item">Pie &amp; Doughnut charts</a>
                  </li>
                  <li><a href="chartjs-scatter-charts.html" class="menu-item">Scatter charts</a>
                  </li>
                  <li><a href="chartjs-polar-radar-charts.html" class="menu-item">Polar &amp; Radar charts</a>
                  </li>
                  <li><a href="chartjs-advance-charts.html" class="menu-item">Advance charts</a>
                  </li>
                </ul>
              </li>
              <li><a href="morris-charts.html" class="menu-item">Morris Charts</a>
              </li>
              <li><a href="#" class="menu-item">Flot Charts</a>
                <ul class="menu-content">
                  <li><a href="flot-line-charts.html" class="menu-item">Line charts</a>
                  </li>
                  <li><a href="flot-bar-charts.html" class="menu-item">Bar charts</a>
                  </li>
                  <li><a href="flot-pie-charts.html" class="menu-item">Pie charts</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="menu-item">Chartist</a>
                <ul class="menu-content">
                  <li><a href="chartist-line-charts.html" class="menu-item">Line charts</a>
                  </li>
                  <li><a href="chartist-bar-charts.html" class="menu-item">Bar charts</a>
                  </li>
                  <li><a href="chartist-pie-charts.html" class="menu-item">Pie charts</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-map"></i><span data-i18n="" class="menu-title">Maps</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">google Maps</a>
                <ul class="menu-content">
                  <li><a href="gmaps-basic-maps.html" class="menu-item">Maps</a>
                  </li>
                  <li><a href="gmaps-services.html" class="menu-item">Services</a>
                  </li>
                  <li><a href="gmaps-overlays.html" class="menu-item">Overlays</a>
                  </li>
                  <li><a href="gmaps-routes.html" class="menu-item">Routes</a>
                  </li>
                  <li><a href="gmaps-utils.html" class="menu-item">Utils</a>
                  </li>
                </ul>
              </li>
              <li><a href="vector-maps-jvector.html" class="menu-item">jVector Map</a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>Others</span><i data-toggle="tooltip" data-placement="right" data-original-title="Others" class=" ft-minus"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-align-left"></i><span data-i18n="" class="menu-title">Menu levels</span></a>
            <ul class="menu-content">
              <li><a href="#" class="menu-item">Second level</a>
              </li>
              <li><a href="#" class="menu-item">Second level child</a>
                <ul class="menu-content">
                  <li><a href="#" class="menu-item">Third level</a>
                  </li>
                  <li><a href="#" class="menu-item">Third level child</a>
                    <ul class="menu-content">
                      <li><a href="#" class="menu-item">Fourth level</a>
                      </li>
                      <li><a href="#" class="menu-item">Fourth level</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="changelog.html"><i class="ft-file"></i><span data-i18n="" class="menu-title">Changelog</span><span class="tag tag tag-pill tag-info float-xs-right">1.1</span></a>
          </li>
          <li class="disabled nav-item"><a href="#"><i class="ft-slash"></i><span data-i18n="" class="menu-title">Disabled Menu</span></a>
          </li>
          <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Raise Support</span></a>
          </li>
          <li class=" nav-item"><a href="https://pixinvent.com/stack-bootstrap-admin-template/documentation"><i class="ft-folder"></i><span data-i18n="" class="menu-title">Documentation</span></a>
          </li> -->
        </ul>
      </div>
    </div>

        <!-- isi konten -->
        @yield('content')



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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
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
</body>
</html>