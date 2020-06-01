<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longtext('alamat');
            $table->biginteger('no_telepon');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->timestamps();
        });
        Schema::create('nasabah_rekening_pegawais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_nasabah');
            $table->unsignedBigInteger('id_rekening');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_nasabah')->references('id')->on('nasabahs')->onDelete('cascade');
            $table->foreign('id_rekening')->references('id')->on('rekenings')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id')->on('pegawais')->onDelete('cascade');
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
        Schema::dropIfExists('nasabahs');
        Schema::dropIfExists('nasabah_rekening_pegawai');
    }
}