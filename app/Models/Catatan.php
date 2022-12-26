<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catatan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nilai_catatan';
    protected $primaryKey = 'kd_cat';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_cat';
    }

    protected $keyType = 'string';
}
