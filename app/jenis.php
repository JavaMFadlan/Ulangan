<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $fillable = ['jenis_rekening'];
    public $timestamps = true;

    public function Rekening()
    {
        return $this->hasMany('App\rekening', 'id_jenis');
    }
}