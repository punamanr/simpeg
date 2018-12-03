<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  protected $primaryKey = 'nip_employee';
  protected $table = 'educations';
  protected $fillable = ['nip_employee','nama_instansi_pendidikan', 'nama_fakultas', 'nama_jurusan','jenjang_pendidikan',
  'gelar', 'nomor_ijazah', 'tahun_masuk', 'tahun_lulus','path_scan_ijazah'];

  public function employee()
  {
   return $this->belongsTo('App\Employee','nip_employee','nip');
  }

  public function position()
  {
   return $this->hasManyThrough('App\Employee',
                                'App\Position',
                                'kode_jabatan',
                                'kode_jabatan_unit_kerja',
                                'nip',
                                'nip_employee');
  }

  // protected $casts = [
  //   'nama_instansi_pendidikan' => 'array',
  //   'nama_fakultas' => 'array',
  //   'nama_jurusan' => 'array',
  //   'jenjang_pendidikan' => 'array',
  //   'gelar' => 'array',
  //   'nomor_ijazah' => 'array',
  //   'tahun_masuk' => 'array',
  //   'tahun_lulus' => 'array',
  //   'path_scan_ijazah' => 'array',
  // ];
}
