<?php 
echo '<select id="kota" name="kota" class="form-control select2">';
echo '<option value="0" selected="" disabled="">Pilih Kota / Kabupaten</option>';  
echo '@foreach ($provinces as $province)
            <option value="{{ $province->provinsi_id }}">{{ $province->nama_provinsi }}</option>
          @endforeach'; 
echo '</select>'; 
?>

{{--         <select id="provinsi" name="provinsi" class="form-control select2">
          <option value="0" selected="" disabled="">Pilih Provinsi</option>
          @foreach ($provinces as $province)
            <option value="{{ $province->provinsi_id }}">{{ $province->nama_provinsi }}</option>
          @endforeach
        </select> --}}