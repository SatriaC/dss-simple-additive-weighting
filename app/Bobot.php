<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bobot extends Model
{
    use SoftDeletes;
    protected $fillable=['jenisPekerjaan', 'JenisBobotPekerjaan', 'kondisiJalan', 'JenisBobotKondisi', 'umurJalan', 'JenisBobotUmur', 'luasKerusakan', 'JenisBobotLuas'];
}
