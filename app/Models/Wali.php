<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wali extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'wali_kelas';
    protected $primaryKey = 'kd_wali';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_wali';
    }
    protected $keyType = 'string';

    public function guru()
    {
        return $this->belongsTo(Guru::class,'kd_guru');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'kd_prodi');
    }
}
