  <?php $jsArray = "var prdName = new Array();\n"; ?>

<div class="form-body">
  <h4 class="form-section"><i class="ft-user"></i> Pegawai RSKK</h4>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nip">Nomor Induk Pegawai</label>
        <select id="nip" name="nip" class="form-control select2" onchange="changeValue(this.value)">
          <option value="0" selected="" disabled="">Pilih NIP RSKK</option>
          @foreach ($employees as $employee)
            <option value="{{ $employee->nip }}">{{ $employee->nip }} - {{$employee->nama_lengkap}}</option>
            <?php 
                $jsArray .= "prdName['" .  $employee->nip . "'] = {name:'" . addslashes($employee->status) . "', unit_kerja:'" . addslashes($employee->nama_unit) . "'};\n";    
            ?>
          @endforeach
        </select>
      </div>
    </div>
{{--     <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap">
 --}}
    <div class="col-md-4">
      <div class="form-group">
        <label for="nama_lengkap">Unit Kerja</label>
        <input type="text" id="unit_kerja" class="form-control" disabled="disabled" name="kode_unit_kerja">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="nama_lengkap">Status</label>
        <input type="text" id="status_pns" class="form-control" disabled="disabled" name="status_pns">
      </div>
    </div>
  </div>

  <h4 class="form-section"><i class="fa fa-file-text-o"></i> Pendidikan</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="table-responsive">  
          <table class="table table-bordered compact" id="dynamic_field">  
              <tr>
                <th rowspan="2" style="vertical-align: middle; text-align: center;">Instansi Pendidikan</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;">Fakultas</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;">Jurusan</th>
                <th rowspan="2" width="15%" style="vertical-align: middle; text-align: center;" >Jenjang</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;" >Nomor Ijazah</th>
                <th colspan="2" width="18%" style="vertical-align: middle; text-align: center;">Tahun</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;">Gelar</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;">Upload Ijazah</th>
                <th rowspan="2" style="vertical-align: middle; text-align: center;"></th>
              </tr>
              <tr>
                <th style="text-align: center;">Masuk</th>
                <th style="text-align: center;">Lulus</th>
              </tr>
              <tr>  
                  <td><input type="text" name="nama_instansi_pendidikan[]" placeholder="Contoh : STIKES, UNPAD" class="form-control name_list" /></td>  
                  <td><input type="text" name="fakultas[]" placeholder="Fakultas" class="form-control name_list" /></td>
                  <td><input type="text" name="nama_jurusan[]" placeholder="Jurusan" class="form-control name_list" /></td> 
                  <td><center>
                  <select id="jenjang_pendidikan" name="jenjang_pendidikan[]" class="form-control name_list compact">
                    <option value="none" selected="" disabled="">Pilih Jenjang</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1 - Diploma 1</option>
                    <option value="D2">D2 - Diploma 2</option>
                    <option value="D3">D3 - Diploma 3</option>
                    <option value="D4">D4 - Diploma 4</option>
                    <option value="S1">S1 - Sarjana</option>
                    <option value="S2">S2 - Magister</option>
                    <option value="S3">S3 - Doktor</option>
                  </select></center>
                  </td> 
                  <td><input type="text" name="nomor_ijazah[]" placeholder="No Ijazah" class="form-control name_list" /></td>
                  <td><input type="number" name="tahun_masuk[]" placeholder="Thn Masuk" class="form-control name_list" /></td> 
                  <td><input type="number" name="tahun_lulus[]" placeholder="Thn Keluar" class="form-control name_list" /></td> 
                  <td><input type="text" name="gelar[]" placeholder="Gelar" class="form-control name_list" /></td> 
                  <td><input type="file" id="file" name="path_scan_ijazah[]"></td>
                  <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">+</button></td>  
              </tr>  
          </table>  
        </div>
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
  <button type="submit" class="btn btn-primary" id="submit">
    <i class="fa fa-check-square-o"></i> Save
  </button>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(id){  
      document.getElementById('status_pns').value = prdName[id].name;  
      document.getElementById('unit_kerja').value = prdName[id].unit_kerja;  
      $('select[id="nip"]').append('<option value="'+ prdName[id].name +'"></option>');
    };  
  </script> 

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="nama_instansi_pendidikan[]" placeholder="Contoh : STIKES, UNPAD" class="form-control name_list" /></td> <td><input type="text" name="fakultas[]" placeholder="Fakultas" class="form-control name_list" /></td> <td><input type="text" name="nama_jurusan[]" placeholder="Jurusan" class="form-control name_list" /></td> <td><select id="jenjang_pendidikan" name="jenjang_pendidikan[]" class="form-control name_list"><option value="none" selected="" disabled="">Pilih Jenjang</option><option value="SD">SD</option><option value="SMP">SMP</option><option value="SMA">SMA</option><option value="D1">D1 - Diploma 1</option><option value="D2">D2 - Diploma 2</option><option value="D3">D3 - Diploma 3</option><option value="D4">D4 - Diploma 4</option><option value="S1">S1 - Sarjana</option><option value="S2">S2 - Magister</option><option value="S3">S3 - Doktor</option></select></center></td><td><input type="text" name="nomor_ijazah[]" placeholder="No Ijazah" class="form-control name_list" /></td> <td><input type="number" name="tahun_masuk[]" placeholder="Thn Masuk" class="form-control name_list" /></td><td><input type="number" name="tahun_lulus[]" placeholder="Thn Keluar" class="form-control name_list" /></td><td><input type="text" name="gelar[]" placeholder="Gelar" class="form-control name_list" /></td><td><input type="file" id="file" name="path_scan_ijazah[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>

<script src="{{asset('assets/js/core/jquery_1.11.3/jquery.min.js')}}" type="text/javascript"></script>

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
