<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nasabah_rekening_pegawai extends Model
{
    protected $fillable = ['id_nasabah','id_rekening','id_pegawai'];
}