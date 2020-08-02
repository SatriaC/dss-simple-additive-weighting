<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jalan extends Model
{
    // protected $table = 'jalans';
    
    use SoftDeletes;
    protected $fillable = ['nama', 'panjang', 'lebar', 'kondisi', 'jenisPekerjaan', 'luasKerusakan', 'tahunPembangunan'];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function nilais()
    {
        return $this->hasMany(\App\Nilai::class);
    }
    
}
