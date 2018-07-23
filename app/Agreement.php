<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    
    protected $table = 'agreements';
    protected $fillable = ['nip','no_sk','nama_lengkap','kode_unit_kerja','tgl_awal_kontrak','tgl_akhir_kontrak','gaji_pokok','insentif','jasa_pelayanan','formula_bpjs','tunjangan_ketenagakerjaan','tunjangan_kesehatan','potongan_pegawai','gaji_bersih'];
}
