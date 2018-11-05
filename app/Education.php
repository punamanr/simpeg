<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  protected $table = 'educations';
  protected $fillable = ['nip_employee','nama_instansi_pendidikan', 'nama_fakultas', 'nama_jurusan','jenjang_pendidikan',
  'gelar', 'nomor_ijazah', 'tahun_masuk', 'tahun_lulus','path_scan_ijazah'];

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
