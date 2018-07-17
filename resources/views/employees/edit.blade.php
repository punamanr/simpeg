@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.min.css')}}">
    <?php 
      $get_status = $employee->status_pns;

      if($get_status == 0)
      {
        $status = 'tkk';
      }
      else
      {
        $status = 'pns';
      }
    ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Data Karyawan</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{  url('/employees') }}">Data Karyawan</a>
                  </li>
                  <li class="breadcrumb-item active">{{$status}}
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Elements start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Edit Data Karyawan ({{$status}})</h4>
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

                <div class="card-body collapse in">
                  <div class="card-block">
                    <form class="form" action="{{ route('employees.update','edit') }}" method="post">
                      {{ csrf_field() }}
                      {{method_field('patch')}}

                      {{-- @include('employees.form') --}}
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Data Personal</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="hidden" id="id_pegawai" class="form-control" name="id_pegawai" value="{{$employee->id}}">
                            @if($status == 'pns')
                            <div class="form-group">
                              <label for="nip">Nomor Induk Pegawai</label>
                              <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip" value="{{$employee->nip}}">
                              <input type="hidden" id="status_pns" class="form-control" name="status_pns" value="1">
                            </div>
                            @else
                            <div class="form-group">
                              <label for="nip">Nomor Induk TKK</label>
                              <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip" value="{{$employee->nip}}">
                              <input type="hidden" id="status_pns" class="form-control" name="status_pns" value="0">
                            </div>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nama_lengkap">Nama Lengkap</label>
                              <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="{{$employee->nama_lengkap}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" value="{{$employee->tempat_lahir}}">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="{{$employee->tanggal_lahir}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kode_agama">Agama</label>
                              <select id="kode_agama" name="kode_agama" class="form-control select2">
                                <option value="none" selected="" disabled="">Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                  <option value="{{ $agama->id }}" {{ ( $employee->kode_agama == $agama->id ) ? ' selected' : '' }}>{{ $agama->nama_agama }}</option>
                                @endforeach
                              </select>      
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option value="none" disabled="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ ($employee->jenis_kelamin == 'Laki-laki') ? 'selected' : ''}}>Laki-laki</option>
                                <option value="Perempuan" {{ ($employee->jenis_kelamin == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="status_perkawinan">Status Perkawinan</label>
                              <select id="status_perkawinan" name="status_perkawinan" class="form-control">
                                <option value="0" disabled="">Pilih Status Perkawinan</option>
                                <option value="kawin" {{ ($employee->status_perkawinan == 'kawin') ? 'selected' : '' }}>Kawin</option>
                                <option value="belum_kawin" {{ ($employee->status_perkawinan == 'belum_kawin') ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="duda" {{ ($employee->status_perkawinan == 'duda') ? 'selected' : '' }}>Duda</option>
                                <option value="janda" {{ ($employee->status_perkawinan == 'janda') ? 'selected' : '' }}>Janda</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea type="text" id="alamat" class="form-control" name="alamat">{{$employee->alamat}}</textarea>
                            </div>
                          </div>
                          <div class="col-md-1">
                            <div class="form-group">
                              <label for="rt">RT</label>
                              <input type="text" id="rt" class="form-control" name="rt" maxlength="3" value="{{$employee->rt}}">
                            </div>
                          </div>
                          <div class="col-md-1">
                            <div class="form-group">
                              <label for="rw">RW</label>
                              <input type="text" id="rw" class="form-control" name="rw" maxlength="3" value="{{$employee->rw}}">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="kecamatan">Kecamatan</label>
                              <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="{{$employee->kecamatan}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="provinsi">Provinsi</label>
                              <select id="provinsi" name="provinsi" class="form-control select2">
                                <option value="0" selected="" disabled="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                  <option value="{{ $province->id }}" {{ ( $employee->provinsi == $province->id ) ? ' selected' : '' }}>{{ $province->nama_provinsi }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kota_kab">Kota / Kabupaten</label>
                              <select id="kota_kab" name="kota_kab" class="form-control select2">
                                @foreach ($kota_kabs as $kota_kab)
                                <option value="{{ $kota_kab->id }}" selected="true">{{ $kota_kab->kota_kabupaten }}</option>
                                @endforeach

                                <option value="0"  disabled="true">Pilih Kota / Kabupaten</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="telepon">Telepon</label>
                              <input type="text" id="telepon" class="form-control" name="telepon" maxlength="12" value="{{$employee->telepon}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kode_pos">Kode POS</label>
                              <input type="text" id="kode_pos" class="form-control" name="kode_pos" pattern="^\s*?\d{5}(?:[-\s]\d{4})?\s*?$" title="Masukan 5 digit angka kode pos" maxlength="5" value="{{$employee->kode_pos}}">
                            </div>
                          </div>
                        </div>

                        <h4 class="form-section"><i class="fa fa-file-text-o"></i> Kepegawaian</h4>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kode_unit_kerja">Unit Kerja Pegawai</label>
                              <select id="kode_unit_kerja" name="kode_unit_kerja" class="form-control select2">
                                <option value="none" selected="" disabled="">Pilih Unit Kerja</option>
                                @foreach ($units as $unit)
                                  <option value="{{ $unit->id }}" {{ ($unit->id == $employee->kode_unit_kerja) ? ' selected' : '' }} >{{ $unit->nama_unit }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @if($status == 'pns')
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="golongan">Golongan</label>
                              <select id="golongan" name="golongan" class="form-control select2">
                                <option value="none" selected="" disabled="">Pilih Golongan</option>
                                @foreach ($panggols as $panggol)
                                  <option value="{{ $panggol->id }}" {{ ($panggol->id == $employee->golongan) ? ' selected' : '' }}>{{ $panggol->golongan }} - {{ $panggol->pangkat}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @else
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="no_sk">Nomor Surat Kontrak</label>
                              <input type="text" id="no_sk" class="form-control" name="no_sk" value="{{$employee->no_sk}}">
                            </div>
                          </div>
                          @endif
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formasi_jabatan">Struktural / Fungsional</label>
                              <select id="formasi_jabatan" name="formasi_jabatan" class="form-control">
                                <option value="none" disabled="">Pilih Formasi Jabatan</option>
                                <option value="struktural" {{ ('struktural' == $employee->formasi_jabatan) ? 'selected' : '' }} >Struktural</option>
                                <option value="fungsional" {{ ('fungsional' == $employee->formasi_jabatan) ? 'selected' : '' }}>Fungsional</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kode_jabatan_unit_kerja">Jabatan</label>
                              <select id="kode_jabatan_unit_kerja" name="kode_jabatan_unit_kerja" class="form-control select2">
                                <option value="none" selected="" disabled="">Pilih Jabatan</option>
                                @foreach ($positions as $position)
                                  <option value="{{ $position->kode_jabatan }}" <?php if ($position->kode_jabatan == $employee->kode_jabatan_unit_kerja) { echo 'selected="selected"'; } ?> >{{ $position->nama_jabatan }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nip_atasan_langsung">NIP Atasan Langsung</label>
                              <select id="nip_atasan_langsung" name="nip_atasan_langsung" class="form-control select2">
                                <option value="none" selected="" disabled="">Pilih NIP</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="status_aktif">Status Aktif</label>
                              <select id="status_aktif" name="status_aktif" class="form-control">
                                <option value="none" disabled="">Pilih Status</option>
                                <option value="aktif" {{ ('aktif' == $employee->status_aktif) ? 'selected' : '' }} >Aktif</option>
                                <option value="mutasi" {{ ('mutasi' == $employee->status_aktif) ? 'selected' : '' }} >Mutasi</option>
                                <option value="pensiun" {{ ('pensiun' == $employee->status_aktif) ? 'selected' : ''}} >Pensiun</option>
                                <option value="non_aktif" {{ ('non_aktif' == $employee->status_aktif) ? 'selected' : ''}} >Non Aktif</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="card-text">
                          <p>Periksa kembali data yang Anda input untuk memastikan data sudah benar.</p>
                        </div>
                      </div>

                      <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> Save
                        </button>
                      </div>

                      <script src="{{asset('assets/js/core/jquery_1.11.3/jquery.min.js')}}" type="text/javascript"></script>

                       <script type="text/javascript">
                         $(document).ready(function() {
                          $('select[name="provinsi"]').on('change', function(){
                              var countryId = $(this).val();
                              if(countryId) {
                                  $.ajax({
                                      url: ' /json-kota_kabs/'+countryId,
                                      type:"GET",
                                      dataType:"json",
                                      success:function(data) {
                                          $('select[name="kota_kab"]').empty();
                                          $.each(data, function(key, value){
                                            $('select[name="kota_kab"]').append('<option value="'+ key +'">' + value + '</option>');
                                          });
                                      }
                                  });
                              } else {
                                  $('select[name="kota_kab"]').empty();
                              }
                          });

                      });
                       </script>


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
