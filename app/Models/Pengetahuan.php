<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengetahuan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_pengetahuan';
    protected $primaryKey = 'kd_np';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_np';
    }

    protected $keyType = 'string';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'kd_mapel');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'kd_siswa');
    }

    public function ajaran()
    {
        return $this->belongsTo(Ajaran::class,'kd_tahun');
    }
}
