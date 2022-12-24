<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KepalaSekolah extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'kd_kepsek';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_kepsek';
    }
    protected $keyType = 'string';
}
