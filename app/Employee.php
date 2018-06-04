<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = [
		'nip','nama_lengkap', 'tempat_lahir', 'tanggal_lahir','jenis_kelamin','status_perkawinan', 'alamat', 'telepon', 'kode_pos','agama','rt','rw','provinsi','kecamatan','kelurahan_desa','kota_kab','unit_kerja','formasi_jabatan','jabatan_unit_kerja','status_pns','status_aktif','nip_atasan_langsung','no_sk'
	];

	public function provinsi()
	{
		return $this->hasOne('App\Provinsi');
	}
}
