<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'guru';
    protected $primaryKey = 'kd_guru';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_guru';
    }

    protected $keyType = 'string';


    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'kd_mapel');
    }
}
