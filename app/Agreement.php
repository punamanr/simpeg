<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    
    protected $table = 'agreements';
    protected $fillable = ['nip','no_sk','unit_kerja','tgl_awal_kontrak','tgl_akhir_kontrak','gaji_pokok','tunjangan','jasa_pelayanan'];
}
