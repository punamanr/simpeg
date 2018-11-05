@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.min.css')}}">

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Data Pendidikan</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{  url('/employees') }}">Pendidikan Pegawai</a>
                  </li>
{{--                   <li class="breadcrumb-item active">{{$status}}
                  </li> --}}
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-6 col-xs-12">
              <div class="form-group"> 
                <a href="{{route('educations.index')}}"><button type="button" class="btn-icon btn btn-danger btn-secondary btn-round"><i class="ft-corner-up-left"></i> Kembali </button></a>
              </div>
            </div>
          </div>
        <div class="content-body"><!-- Basic Elements start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Form Detail Pendidikan</h4>
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
                  <div class="card-block">
                    <form class="form" action="{{ route('educations.store') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      @include('educations.form')

                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
        </div><!-- Basic Inputs end -->
      </div>
    </div>
@endsection