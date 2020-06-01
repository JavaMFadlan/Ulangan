<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    protected $fillable = ['no_rekening','id_kartu','id_jenis','id_bank','saldo','masa_pakai','aktif'];
    public $timestamps = true;
    
    public function Nasabah()
    {
        return $this->belongsToMany('App\nasabah','nasabah_rekening_pegawais','id_rekening','id_nasabah');
    }
    public function Pegawai()
    {
        return $this->belongsToMany('App\pegawai','nasabah_rekening_pegawais','id_nasabah','id_pegawai');
    }
    public function Jenis()
    {
        return $this->belongsTo('App\jenis','id_jenis');
    }
    public function Kartu()
    {
        return $this->belongsTo('App\kartu','id_kartu');
    }
    public function Cabang_bank()
    {
        return $this->belongsTo('App\cabang_bank','id_bank');
    }
    
}