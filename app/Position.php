<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  protected $table = 'positions';
  protected $fillable = ['kode_jabatan','nama_jabatan','status_pejabat','nip'];
  
  public function employee()
  {
   return $this->belongsTo('App\Employee','kode_jabatan','kode_jabatan_unit_kerja');
  }
}
