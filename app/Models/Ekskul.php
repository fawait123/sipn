<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekskul extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'ekskul';
    protected $primaryKey = 'kd_ekskul';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_ekskul';
    }
    protected $keyType = 'string';
}
