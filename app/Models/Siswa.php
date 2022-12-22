<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'siswa';
    protected $primaryKey = 'kd_siswa';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_siswa';
    }
    protected $keyType = 'string';


    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'kd_prodi');
    }
}
