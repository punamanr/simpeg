<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan_desa');
            $table->string('kecamatan');
            $table->string('kota_kab');
            $table->string('provinsi');
            $table->string('telepon');
            $table->string('kode_pos');
            $table->string('kode_unit_kerja');
            $table->string('formasi_jabatan');
            $table->string('jabatan_unit_kerja');
            $table->string('status_aktif');
            $table->integer('status_pns');
            $table->string('golongan');
            $table->string('nip_atasan_langsung');
            $table->string('no_sk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
