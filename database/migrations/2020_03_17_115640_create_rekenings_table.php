<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartus', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('no_kartu')->unique();
            $table->integer('no_sandi');
            $table->date('masa_berlaku');
            $table->integer('kode_cvv');
            $table->timestamps();
        });
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('no_rekening')->unique();
            $table->UnsignedBiginteger('id_kartu');
            $table->unsignedBigInteger('id_jenis');
            $table->integer('saldo');
            $table->date('masa_pakai');
            $table->string('aktif');
            $table->foreign('id_kartu')->references('id')->on('kartus')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
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
        Schema::dropIfExists('kartus');
        Schema::dropIfExists('rekenings');
    }
}