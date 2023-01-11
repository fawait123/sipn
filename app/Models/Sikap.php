<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sikap extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_sikap';
    protected $primaryKey = 'kd_nsikap';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_nsikap';
    }

    public function wali()
    {
        return $this->belongsTo(Wali::class,'kd_wali');
    }

    protected $keyType = 'string';
}
