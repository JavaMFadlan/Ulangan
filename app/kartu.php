<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kartu extends Model
{
    protected $fillable = ['no_kartu','no_sandi','masa_berlaku','kode_cvv'];
    public $timestamps = true;
    
    public function Rekening()
    {
        return $this->hasOne('App\rekening','id_kartu');
    }
}