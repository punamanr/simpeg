@if(isset($_GET['status']))
<?php $status = $_GET['status'];?>
{{-- js untuk format uang --}}
<script src="{{asset('assets/js/core/jquery_3.3.1/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/jquery.mask.min.js')}}" type="text/javascript" defer></script>

<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

  @if($status == 'baru')
  {{-- get data dari bpjs master untuk function hitung--}}
  <input type="hidden" name="tunjangan_jht" id="tunjangan_jht" value="{{$bpjs->tunjangan_jht}}">
  <input type="hidden" name="tunjangan_jkk" id="tunjangan_jkk" value="{{$bpjs->tunjangan_jkk}}">
  <input type="hidden" name="tunjangan_jk" id="tunjangan_jk" value="{{$bpjs->tunjangan_jk}}">
  <input type="hidden" name="tunjangan_jp" id="tunjangan_jp" value="{{$bpjs->tunjangan_jp}}">
  <input type="hidden" name="tunjangan_kesehatan" id="tunjangan_kesehatan" value="{{$bpjs->tunjangan_kesehatan}}">
  <input type="hidden" name="potongan_peg_ketenagakerjaan" id="potongan_peg_ketenagakerjaan" value="{{$bpjs->potongan_peg_ketenagakerjaan}}">
  <input type="hidden" name="potongan_peg_kesehatan" id="potongan_peg_kesehatan" value="{{$bpjs->potongan_peg_kesehatan}}">
  <input type="hidden" name="umk" id="umk" value="{{$bpjs->umk}}">

  {{-- end get  --}}

  <div class="form-body">
    <div class="form-group row">
        <label class="col-md-3 label-control" for="timesheetinput1">Nomor Kontrak</label>
        <div class="col-md-9">
          <div class="position-relative has-icon-left">
            <input type="text" id="no_sk" class="form-control" name="no_sk" value="{{ $no_sk }}">
            <div class="form-control-position">
                <i class="fa fa-book"></i>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 label-control" for="timesheetinput2">Nomor Induk Pegawai</label>
      <div class="col-md-9">
        <div class="position-relative has-icon-left">
          <input type="text" id="nip" class="form-control" placeholder="NIP TKK" name="nip" value="{{ $nip_otomatis }}" maxlength="10">
          <div class="form-control-position">
              <i class="ft-user"></i>
          </div>
        </div>
       </div>
    </div>

    <div class="form-group row">
      <label class="col-md-3 label-control" for="timesheetinput3">Nama Lengkap</label>
      <div class="col-md-9">
          <div class="position-relative has-icon-left">
            <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap">
            <div class="form-control-position">
                <i class="fa fa-pencil"></i>
            </div>
          </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-3 label-control" for="timesheetinput3">Unit Kerja</label>
      <div class="col-md-9">
          <div class="position-relative has-icon-left">
            <select id="kode_unit_kerja" name="kode_unit_kerja" class="form-control select2">
              <option value="none" selected="" disabled="">Pilih Unit Kerja</option>
              @foreach ($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
              @endforeach
            </select>
          </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 label-control" for="timesheetinput3">Tanggal Kontrak Kerja</label>
      <div class="col-md-9">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-4 label-control tag tag-primary" for="awal_kontrak">Awal Kontrak</label>
            <input type="date" id="awal_kontrak" class="form-control" name="tgl_awal_kontrak">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group ">
            <label class="col-md-4 label-control tag tag-danger" for="akhir_kontrak">Akhir Kontrak</label>
            <input type="date" id="akhir_kontrak" class="form-control" name="tgl_akhir_kontrak">
          </div>
        </div>
      </div>
    </div>
    <h4 class="card-title" id="basic-layout-form">Nilai Kontrak</h4>
    <div class="form-group row">
      <label class="col-md-3 label-control">Formula Perhitungan</label>
      <div class="col-md-4">
        <select id="formula" name="formula_bpjs" class="form-control" onchange="hitung()">
          <option>Pilih Formula Hitung BPJS</option>
          <option value="gaji_kotor">Gaji Kotor</option>
          <option value="umk">UMK {{date('Y')}}</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 label-control">Honorarium</label>
      <div class="col-md-9">
          <div class="col-md-3 row">
            <input type="text" onblur="hitung();" class="form-control text-md-right" name="gaji_pokok" id="honorarium" placeholder="Gaji Pokok">
          </div>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon">Rp</span>            
              <input type="text" class="form-control uang text-md-right"  disabled="disabled"  aria-label="Amount (to the nearest rupiah)" name="temp_gaji" id="temp_gaji">
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 label-control">Insentif</label>
      <div class="col-md-9">
          <div class="col-md-3 row">
            <input type="text" onblur="hitung();" class="form-control text-md-right" name="insentif" id="insentif" placeholder="Isi 0 jika tidak ada">
          </div>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control uang text-md-right" disabled="disabled"  aria-label="Amount (to the nearest rupiah)" name="temp_insentif" id="temp_insentif">
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 label-control">Jasa Pelayanan</label>
      <div class="col-md-9">
          <div class="col-md-3 row">
            <input type="text" onblur="hitung();" class="form-control text-md-right" name="jasa_pelayanan" id="jasa_pelayanan" placeholder="Isi 0 jika tidak ada">
          </div>
          <div class="col-md-5">
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control uang text-md-right" disabled="disabled" aria-label="Amount (to the nearest rupiah)" name="temp_jasa_pelayanan" id="temp_jasa_pelayanan">
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
    </div>
    <input type="hidden" class="form-control uang text-md-right"  readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="pilihan" id="pilihan">

    <div class="gaji_kotor box form-group row">
      <label class="col-md-3 label-control" for="timesheetinput3">Tunjangan BPJS</label>
      <div class="col-md-9">
        <div class="col-md-4">
          <div class="form-group row">
            <label class="label-control" for="bpjs_ketenagakerjaan">Ketenagakerjaan <span id="pct_naker" class="text-bold-600"></span> %</label>
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group ">
            <label class="label-control" for="bpjs_kesehatan">Kesehatan <span id="pct_kesehatan" class="text-bold-600"></span> %</label>
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="bpjs_kesehatan" id="bpjs_kesehatan">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group row">
            <label class="label-control" for="bpjs_potongan_pegawai">Potongan Pegawai <span id="pct_karyawan" class="text-bold-600"></span> %</label>
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="bpjs_potongan_pegawai" id="bpjs_potongan_pegawai">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group row">
            <label class="label-control text-bold-700" for="bpjs_potongan_pegawai">Total Bayar BPJS</label> <span id="total_bayar_bpjs" class="tag tag-primary text-bold-600"></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group row">
            <label class="label-control text-bold-700" for="bpjs_potongan_pegawai">Gaji Bersih</label> <span id="gaji_bersih" class="tag tag-default text-bold-600"></span>
            <input type="hidden" name="nett_salary" id="nett_salary">
          </div>
        </div>
      </div>
    </div>

    <div class="umk box">
      <h2 class="card-content tag bg-pink bg-darken-3" id="basic-layout-form">
        UMK {{date('Y')}} : Rp {{number_format($bpjs->umk)}}
      </h2>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="timesheetinput3">Tunjangan BPJS</label>
        <div class="col-md-9">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="label-control" for="bpjs_ketenagakerjaan">Ketenagakerjaan <span id="umk_pct_naker" class="text-bold-600"></span> %</label>
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="umk_bpjs_ketenagakerjaan" id="umk_bpjs_ketenagakerjaan">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group ">
              <label class="label-control" for="bpjs_kesehatan">Kesehatan <span id="umk_pct_kesehatan" class="text-bold-600"></span> %</label>
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="umk_bpjs_kesehatan" id="umk_bpjs_kesehatan">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="label-control" for="bpjs_potongan_pegawai">Potongan Pegawai <span id="umk_pct_karyawan" class="text-bold-600"></span> %</label>
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control uang text-md-right" readonly="readonly"  aria-label="Amount (to the nearest rupiah)" name="umk_bpjs_potongan_pegawai" id="umk_bpjs_potongan_pegawai">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="label-control text-bold-700" for="bpjs_potongan_pegawai">Total Bayar BPJS</label> <span id="umk_total_bayar_bpjs" class="tag tag-primary text-bold-600"></span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="label-control text-bold-700" for="bpjs_potongan_pegawai">Gaji Bersih</label> <span id="umk_gaji_bersih" class="tag tag-default text-bold-600"></span>
              <input type="hidden" name="umk_nett_salary" id="umk_nett_salary">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="form-actions">
    <button type="reset" class="btn btn-warning mr-1">
      <i class="ft-x"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-check-square-o"></i> Save
    </button>
  </div>


  @else
  tkk lama
  @endif
@else
<div class="content-header-center text-md-right col-md-8 col-xs-12">
  <div class="form-body center">
    <a href="{{route('agreements.create',['status' => 'baru'])}}"><button type="button" class="btn-icon btn btn-success btn-secondary btn-round"><i class="ft-plus"></i> TKK Baru</button></a>
    <a href="{{route('agreements.create',['status' => 'lama'])}}"><button type="button" class="btn-icon btn btn-warning btn-secondary btn-round"><i class="ft-plus"></i> Perpanjang Kontrak TKK</button></a>
  </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function(){
    // Format mata uang.
    $( '.uang1' ).mask('0.000.000.000', {reverse: true});
    // Format nomor HP.
    $( '.no_hp' ).mask('0000−0000−0000');
    // Format tahun pelajaran.
    $( '.tapel' ).mask('0000/0000');
})

// function convertToRupiah(angka){
//     var rupiah = '';
//     var angkarev = angka.toString().split('').reverse().join('');
//     for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
//     return rupiah.split('',rupiah.length-1).reverse().join('');
// }

function convertToRupiah(nStr) {
   nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
  }


//hitung skema pembayaran bpjs ketenagakerjaan dan bpjs kesehatan
function hitung() {

  var temp_gaji_pokok = document.getElementById("honorarium").value;
  var rupiah_temp_gaji_pokok = convertToRupiah(temp_gaji_pokok);
  var temp_insentif = document.getElementById("insentif").value;
  var rupiah_temp_insentif = convertToRupiah(temp_insentif);
  var temp_jasa_pelayanan = document.getElementById("jasa_pelayanan").value;
  var rupiah_temp_jasa_pelayanan = convertToRupiah(temp_jasa_pelayanan);
  var pilih_formula = document.getElementById("formula").value;


  //temporary input
  document.getElementById("temp_gaji").value = rupiah_temp_gaji_pokok;
  document.getElementById("temp_insentif").value = rupiah_temp_insentif;
  document.getElementById("temp_jasa_pelayanan").value = rupiah_temp_jasa_pelayanan;


  var gaji_pokok = parseInt($("#honorarium").val());
  var insentif = parseInt($("#insentif").val());
  var jasa_pelayanan = parseInt($("#jasa_pelayanan").val());
  
  //rumus bpjs
  var pct_jht = parseFloat(document.getElementById("tunjangan_jht").value);
  var pct_jkk = parseFloat(document.getElementById("tunjangan_jkk").value);
  var pct_jk = parseFloat(document.getElementById("tunjangan_jk").value);
  var pct_jp = parseFloat(document.getElementById("tunjangan_jp").value);
  var pct_bpjs_kesehatan_pemberi_kerja = parseFloat(document.getElementById("tunjangan_kesehatan").value);
  var pct_bpjs_ketenagakerjaan_pemberi_kerja = (pct_jht + pct_jkk + pct_jk + pct_jp);
  var pct_bpjs_kesehatan = parseFloat(document.getElementById("potongan_peg_kesehatan").value);
  var pct_bpjs_ketenagakerjaan = parseFloat(document.getElementById("potongan_peg_ketenagakerjaan").value);
  var umk_terbaru = parseFloat(document.getElementById("umk").value);

  var x = (document.getElementById("pilihan").value = pilih_formula);

  //hitung
  if(x === "gaji_kotor")
  {
    var penghasilan =  gaji_pokok + insentif + jasa_pelayanan; //total gaji kotor pegawai
  }
  else if(x === "umk")
  {
    var penghasilan = umk_terbaru;
  }

  var bpjs_potongan_pegawai = penghasilan * (pct_bpjs_kesehatan+pct_bpjs_ketenagakerjaan);
  var bpjs_ketenagakerjaan = penghasilan * pct_bpjs_ketenagakerjaan_pemberi_kerja;
  var bpjs_kesehatan = penghasilan * pct_bpjs_kesehatan_pemberi_kerja;
  var total_bayar_bpjs = bpjs_potongan_pegawai + bpjs_ketenagakerjaan + bpjs_kesehatan;
  var netto = penghasilan - bpjs_potongan_pegawai;

  //info persen
  $("#pct_naker").html((pct_bpjs_ketenagakerjaan_pemberi_kerja * 100).toFixed(2));
  $("#pct_kesehatan").html((pct_bpjs_kesehatan_pemberi_kerja * 100).toFixed(2));
  $("#pct_karyawan").html(((pct_bpjs_kesehatan+pct_bpjs_ketenagakerjaan) * 100).toFixed(2));
  $("#umk_pct_naker").html((pct_bpjs_ketenagakerjaan_pemberi_kerja * 100).toFixed(2));
  $("#umk_pct_kesehatan").html((pct_bpjs_kesehatan_pemberi_kerja * 100).toFixed(2));
  $("#umk_pct_karyawan").html(((pct_bpjs_kesehatan+pct_bpjs_ketenagakerjaan) * 100).toFixed(2));


  $("#bpjs_ketenagakerjaan").val(convertToRupiah(Math.round(bpjs_ketenagakerjaan)));
  $("#bpjs_kesehatan").val(convertToRupiah(Math.round(bpjs_kesehatan)));
  $("#bpjs_potongan_pegawai").val(convertToRupiah(Math.round(bpjs_potongan_pegawai)));
  $("#total_bayar_bpjs").html(convertToRupiah(Math.round(total_bayar_bpjs)));
  $("#gaji_bersih").html(convertToRupiah(Math.round(netto)));
  $("#nett_salary").val(convertToRupiah(Math.round(netto)));

  $("#umk_bpjs_ketenagakerjaan").val(convertToRupiah(Math.round(bpjs_ketenagakerjaan)));
  $("#umk_bpjs_kesehatan").val(convertToRupiah(Math.round(bpjs_kesehatan)));
  $("#umk_bpjs_potongan_pegawai").val(convertToRupiah(Math.round(bpjs_potongan_pegawai)));
  $("#umk_total_bayar_bpjs").html(convertToRupiah(Math.round(total_bayar_bpjs)));
  $("#umk_gaji_bersih").html(convertToRupiah(Math.round(netto)));
  $("#umk_nett_salary").val(convertToRupiah(Math.round(netto)));

  document.getElementById("pilihan").value = penghasilan;

}


function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode;
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
}

</script>





{{-- @if($_GET['status'] == 'baru')
<div class="form-body">
  <div class="form-group row">
      <label class="col-md-3 label-control" for="timesheetinput1">Nomor Kontrak</label>
      <div class="col-md-9">
        <div class="position-relative has-icon-left">
        	<input type="text" id="no_sk" class="form-control" name="no_sk" value="{{ $no_sk }}">
          <div class="form-control-position">
              <i class="fa fa-book"></i>
          </div>
        </div>
      </div>
  </div>
  <div class="form-group row">
  	<label class="col-md-3 label-control" for="timesheetinput2">Nomor Induk Pegawai</label>
  	<div class="col-md-9">
      <div class="position-relative has-icon-left">
      	<input type="text" id="nip" class="form-control" placeholder="NIP TKK" name="nip" value="{{ $nip_otomatis }}" maxlength="10">
        <div class="form-control-position">
            <i class="ft-user"></i>
        </div>
      </div>
     </div>
  </div>

  <div class="form-group row">
  	<label class="col-md-3 label-control" for="timesheetinput3">Nama Lengkap</label>
  	<div class="col-md-9">
        <div class="position-relative has-icon-left">
        	<input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap">
          <div class="form-control-position">
              <i class="fa fa-pencil"></i>
          </div>
        </div>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-3 label-control" for="timesheetinput3">Unit Kerja</label>
    <div class="col-md-9">
        <div class="position-relative has-icon-left">
          <select id="kode_unit_kerja" name="kode_unit_kerja" class="form-control select2">
            <option value="none" selected="" disabled="">Pilih Unit Kerja</option>
            @foreach ($units as $unit)
              <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
            @endforeach
          </select>
        </div>
    </div>
  </div>

  <div class="form-group row">
  	<label class="col-md-3 label-control">Rate Per Hour</label>
  	<div class="col-md-9">
        <div class="input-group">
    			<span class="input-group-addon">$</span>
    			<input type="text" class="form-control" placeholder="Rate Per Hour" aria-label="Amount (to the nearest dollar)" name="rateperhour">
    			<span class="input-group-addon">.00</span>
    		</div>
    	</div>
  </div>

  <div class="form-group row">
    	<label class="col-md-3 label-control" for="timesheetinput5">Start Time</label>
    	<div class="col-md-9">
        <div class="position-relative has-icon-left">
        	<input type="time" id="timesheetinput5" class="form-control" name="starttime">
          <div class="form-control-position">
              <i class="ft-clock"></i>
          </div>
        </div>
    </div>
  </div>

  <div class="form-group row">
    	<label class="col-md-3 label-control" for="timesheetinput6">End Time</label>
    	<div class="col-md-9">
        <div class="position-relative has-icon-left">
        	<input type="time" id="timesheetinput6" class="form-control" name="endtime">
          <div class="form-control-position">
              <i class="ft-clock"></i>
          </div>
        </div>
    </div>
  </div>

  <div class="form-group row">
  	<label class="col-md-3 label-control" for="timesheetinput7">Notes</label>
  	<div class="col-md-9">
  		  <div class="position-relative has-icon-left">
        	<textarea id="timesheetinput7" rows="5" class="form-control" name="notes" placeholder="notes"></textarea>
          <div class="form-control-position">
              <i class="ft-file"></i>
          </div>
        </div>
    </div>
  </div>
</div>
@endif

 --}}