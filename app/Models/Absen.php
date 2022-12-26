<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absen extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_absen';
    protected $primaryKey = 'kd_nabsen';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_nabsen';
    }

    protected $keyType = 'string';
}
