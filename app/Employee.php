<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
	protected $fillable = [
		'nip','nama_lengkap', 'tempat_lahir', 'tanggal_lahir','jenis_kelamin','status_perkawinan', 'alamat', 'telepon', 'kode_pos','kode_agama','rt','rw','provinsi','kecamatan','kelurahan_desa','kota_kab','kode_unit_kerja','formasi_jabatan','kode_jabatan_unit_kerja','status_pns','status_aktif','nip_atasan_langsung','golongan','no_sk'
	];

	// public function provinsi()
	// {
	// 	return $this->hasOne(Provinsi::class);
	// }

  // public function unit()
  // {
  //   $this->hasOne(Unit::class);
  // }

  // public function agama()
  // {
  //   $this->hasOne(agama::class);
  // }

  // public function position()
  // {
  //   $this->hasOne(position::class);
  // }
}
