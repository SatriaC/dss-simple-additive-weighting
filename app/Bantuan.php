<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bantuan extends Model
{
    use SoftDeletes;
    protected $fillable = ['judulIsi','isiBantuan'];
}
