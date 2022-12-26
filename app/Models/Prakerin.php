<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prakerin extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_prakerin';
    protected $primaryKey = 'kd_npkl';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_npkl';
    }

    protected $keyType = 'string';
}
