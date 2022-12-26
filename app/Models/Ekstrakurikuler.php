<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekstrakurikuler extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_ekstrakurikuler';
    protected $primaryKey = 'kd_nekskul';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_nekskul';
    }

    protected $keyType = 'string';

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class,'kd_ekskul');
    }
}
