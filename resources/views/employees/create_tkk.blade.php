@extends('layouts.app')

@section('content')
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
                  <li class="breadcrumb-item"><a href="{{ url('/employee/index') }}">Data Karyawan</a>
                  </li>
                  <li class="breadcrumb-item active">Honorer
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
                  <h4 class="card-title" id="basic-layout-form">Form Tambah Karyawan (Honorer)</h4>
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
                    <form class="form" action="{{ route('employee.store') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Data Personal</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nip">Nomor Induk Pegawai</label>
                              <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip">
                              <input type="hidden" id="status_pns" class="form-control" name="status_pns" value="0">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nama_lengkap">Nama Lengkap</label>
                              <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option value="none" selected="" disabled="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="status_perkawinan">Status Perkawinan</label>
                              <select id="status_perkawinan" name="status_perkawinan" class="form-control">
                                <option value="0" selected="" disabled="">Pilih Status Perkawinan</option>
                                <option value="kawin">Kawin</option>
                                <option value="belum_kawin">Belum Kawin</option>
                                <option value="duda">Duda</option>
                                <option value="janda">Janda</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea type="text" id="alamat" class="form-control" name="alamat"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kecamatan">Kecamatan</label>
                              <select id="kecamatan" name="kecamatan" class="form-control">
                                <option value="0" selected="" disabled="">Pilih Kecamatan</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kota_kab">Kota / Kabupaten</label>
                              <select id="kota_kab" name="kota_kab" class="form-control">
                                <option value="0" selected="" disabled="">Pilih Kota / Kabupaten</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="telepon">Telepon</label>
                              <input type="text" id="telepon" class="form-control" name="telepon" maxlength="12">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="kode_pos">Kode POS</label>
                              <input type="text" id="kode_pos" class="form-control" name="kode_pos">
                            </div>
                          </div>
                        </div>

                        <h4 class="form-section"><i class="fa fa-file-text-o"></i> Kepegawaian</h4>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="no_sk">Nomor Surat Kontrak</label>
                              <input type="text" id="no_sk" class="form-control" name="no_sk">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="unit_kerja">Unit Kerja Pegawai</label>
                              <select id="unit_kerja" name="unit_kerja" class="form-control">
                                <option value="none" selected="" disabled="">Pilih Unit Kerja</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="unit_kerja">Jabatan</label>
                              <select id="unit_kerja" name="unit_kerja" class="form-control">
                                <option value="none" selected="" disabled="">Pilih Jabatan</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="status_aktif">Status Aktif</label>
                              <select id="status_aktif" name="status_aktif" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="mutasi">Mutasi</option>
                                <option value="pensiun">Pensiun</option>
                                <option value="non_aktif">Non Aktif</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nip_atasan_langsung">NIP Atasan Langsung</label>
                              <select id="nip_atasan_langsung" name="nip_atasan_langsung" class="form-control">
                                <option value="none" selected="" disabled="">Pilih NIP</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nama_atasan_langsung">Nama Atasan Langsung</label>
                              <input type="text" id="nama_atasan_langsung" class="form-control" disabled="disabled" name="nama_atasan_langsung">
                            </div>
                          </div>
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
