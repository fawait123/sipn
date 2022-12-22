<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajaran extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'kd_tahun';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_tahun';
    }
    protected $keyType = 'string';
}
