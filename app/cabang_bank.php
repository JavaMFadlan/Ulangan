<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cabang_bank extends Model
{
    protected $fillable = ['nama_bank','alamat_bank','jenis_bank','status_bank'];
    public $timestamps = true;

    public function Pegawais()
    {
        return $this->hasMany('App\pegawai','id_bank');
    }
    public function Rekening()
    {
        return $this->hasMany('App\rekening','id_rekening');
    }
}