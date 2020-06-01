<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $fillable = ['no_pegawai','id_bank','nama','alamat','tgl_lahir'];
    public $timestamps = true;
    
    public function Rekening()
    {
        return $this->belongsToMany('App\rekening','nasabah_rekening_pegawais','id_pegawai','id_rekening');
    }
    public function Nasabah()
    {
        return $this->belongsToMany('App\nasabah','nasabah_rekening_pegawais','id_pegawai','id_nasabah');
    }
    public function Cabang_bank()
    {
        return $this->belongsTo('App\cabang_bank','id_bank');
    }
}