<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    protected $fillable = ['nama','alamat','no_telepon','tgl_lahir','pekerjaan'];
    public $timestamps = true;
    
    public function Rekening()
    {
        return $this->belongsToMany('App\rekening','nasabah_rekening_pegawais','id_nasabah','id_rekening');
    }
    public function Pegawai()
    {
        return $this->belongsToMany('App\pegawai','nasabah_rekening_pegawais','id_nasabah','id_pegawai');
    }
}