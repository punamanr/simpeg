<?php $jsArray = "var prdName = new Array();\n"; ?>
<div class="form-body">
  <h4 class="form-section"><i class="ft-user"></i> Data Personal</h4>
  <div class="row">
    <div class="col-md-6">
      @if($status == 'pns')
      <div class="form-group">
        <label for="nip">Nomor Induk Pegawai</label>
        <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip">
        <input type="hidden" id="status_pns" class="form-control" name="status_pns" value="1">
      </div>
      @else
      <div class="form-group">
        <label for="nip">Nomor Induk TKK</label>
        {{-- <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip"> --}}
        <select id="nip" name="nip" class="form-control select2" onchange="changeValue(this.value)">
          <option value="0" selected="" disabled="">Pilih NIP - TKK</option>
          @foreach ($agreements as $agreement)
            <option value="{{ $agreement->nip }}">{{ $agreement->nip }} - {{$agreement->nama_lengkap}}</option>
            <?php 
              $jsArray .= "prdName['" .  $agreement->nip . "'] = {name:'" . addslashes($agreement->nama_lengkap) . "',no_sk:'" . addslashes($agreement->no_sk) . "'};\n";    
            ?>
          @endforeach
        </select>
        <input type="hidden" id="status_pns" class="form-control" name="status_pns" value="0">
      </div>
      @endif
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" readonly="readonly">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="kode_agama">Agama</label>
        <select id="kode_agama" name="kode_agama" class="form-control select2">
          <option value="none" selected="" disabled="">Pilih Agama</option>
          @foreach ($agamas as $agama)
            <option value="{{ $agama->id }}">{{ $agama->nama_agama }}</option>
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
    <div class="col-md-6">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea type="text" id="alamat" class="form-control" name="alamat"></textarea>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-group">
        <label for="rt">RT</label>
        <input type="text" id="rt" class="form-control" name="rt" maxlength="3">
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-group">
        <label for="rw">RW</label>
        <input type="text" id="rw" class="form-control" name="rw" maxlength="3">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <input type="text" id="kecamatan" class="form-control" name="kecamatan">
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
            <option value="{{ $province->id }}">{{ $province->nama_provinsi }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="kota_kab">Kota / Kabupaten</label>
        <select id="kota_kab" name="kota_kab" class="form-control select2">
          <option value="0" selected="true" disabled="true">Pilih Kota / Kabupaten</option>
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
        <input type="text" id="kode_pos" class="form-control" name="kode_pos" pattern="^\s*?\d{5}(?:[-\s]\d{4})?\s*?$" title="Masukan 5 digit angka kode pos" maxlength="5">
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
            <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
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
            <option value="{{ $panggol->id }}">{{ $panggol->golongan }} - {{ $panggol->pangkat}}</option>
          @endforeach
        </select>
      </div>
    </div>
    @else
    <div class="col-md-6">
      <div class="form-group">
        <label for="no_sk">Nomor Surat Kontrak</label>
        <input type="text" id="no_sk" class="form-control" name="no_sk" readonly="readonly">
      </div>
    </div>
    @endif
  </div>

  <div class="row">
    @if($status == 'pns')
    <div class="col-md-6">
      <div class="form-group">
        <label for="formasi_jabatan">Struktural / Fungsional</label>
        <select id="formasi_jabatan" name="formasi_jabatan" class="form-control">
          <option value="none" selected="" disabled="">Pilih Formasi Jabatan</option>
          <option value="struktural">Struktural</option>
          <option value="fungsional">Fungsional</option>
        </select>
      </div>
    </div>
    @else
    <div class="col-md-6">
      <div class="form-group">
        <label for="nip_atasan_langsung">NIP Atasan Langsung</label>
        <select id="nip_atasan_langsung" name="nip_atasan_langsung" class="form-control select2">
          <option value="none" selected="" disabled="">Pilih NIP</option>
        </select>
      </div>
    </div>
    @endif
    <div class="col-md-6">
      <div class="form-group">
        <label for="unit_kerja">Jabatan</label>
        <select id="unit_kerja" name="unit_kerja" class="form-control select2">
          <option value="none" selected="" disabled="">Pilih Jabatan</option>
          @foreach ($positions as $position)
            <option value="{{ $position->kode_jabatan }}">{{ $position->nama_jabatan }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    @if($status == 'pns')
    <div class="col-md-6">
      <div class="form-group">
        <label for="nip_atasan_langsung">NIP Atasan Langsung</label>
        <select id="nip_atasan_langsung" name="nip_atasan_langsung" class="form-control select2">
          <option value="none" selected="" disabled="">Pilih NIP</option>
        </select>
      </div>
    </div>
    @endif
    <div class="col-md-6">
      <div class="form-group">
        <label for="status_aktif">Status Aktif</label>
        <select id="status_aktif" name="status_aktif" class="form-control">
          <option value="none" selected="" disabled="">Pilih status</option>
          <option value="aktif">Aktif</option>
          <option value="mutasi">Mutasi</option>
          <option value="pensiun">Pensiun</option>
          <option value="non_aktif">Non Aktif</option>
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
  <?php echo $jsArray; ?>  
  function changeValue(id){  
  document.getElementById('nama_lengkap').value = prdName[id].name;  
  document.getElementById('no_sk').value = prdName[id].no_sk;  
  };  
</script> 

<script type="text/javascript">
$(document).ready(function() {
    $('select[name="provinsi"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/json-kota_kabs/'+countryId,
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
// $(document).ready(function() {
//     $('select[name="nip"]').on('change', function(){
//         var countryId = $(this).val();
//         if(countryId) {
//             $.ajax({
//                 url: '/json-kota_kabs/'+countryId,
//                 type:"GET",
//                 dataType:"json",
//                 success:function(data) {
//                     $('input[name="kota_kab"]').empty();
//                     $.each(data, function(key, value){
//                       $('input[name="kota_kab"]').val('<option value="'+ key +'">' + value + '</option>');
//                     });
//                 }
//             });
//         } else {
//             $('input[name="kota_kab"]').empty();
//         }
//     });

// });
</script>
