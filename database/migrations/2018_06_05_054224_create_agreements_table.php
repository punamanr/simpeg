<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip');
            $table->string('no_sk');
            $table->string('unit_kerja');
            $table->date('tgl_awal_kontrak');
            $table->date('tgl_akhir_kontrak');
            $table->float('gaji_pokok');
            $table->float('tunjangan');
            $table->float('jasa_pelayanan');
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
        Schema::dropIfExists('agreements');
    }
}
