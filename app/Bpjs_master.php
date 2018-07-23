<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpjs_master extends Model
{
    protected $table = 'bpjs_masters';
    protected $fillable = ['tunjangan_jht','tunjangan_jkk','tunjangan_jp','tunjangan_jk','tunjangan_kesehatan','potongan_peg_ketenagakerjaan','potongan_peg_kesehatan','umk'];
}
