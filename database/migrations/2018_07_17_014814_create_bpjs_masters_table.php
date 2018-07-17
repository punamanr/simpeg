<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpjsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->float('tunjangan_jht');
            $table->float('tunjangan_jkk');
            $table->float('tunjangan_jk');
            $table->float('tunjangan_jp');
            $table->float('tunjangan_kesehatan');
            $table->float('potongan_peg_ketenagakerjaan');
            $table->float('potongan_peg_kesehatan');
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
        Schema::dropIfExists('bpjs_masters');
    }
}
