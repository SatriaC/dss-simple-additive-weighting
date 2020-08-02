<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria extends Model
{
    use softDeletes;
    protected $fillable=['nama', 'jenis', 'bobot'];
    protected $hidden = ['created_at', 'updated_at','hidden_at'];

    
    public function nilais() {
        return $this->hasMany(\App\Nilai::class);
    }
    
}
