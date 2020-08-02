<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['jalan_id', 'kriteria_id', 'nilai_alt'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
    public function kriteria()
    {
        return $this->belongsTo(\App\Kriteria::class, 'kriteria_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(\App\Jalan::class, 'jalan_id');
    }
}
