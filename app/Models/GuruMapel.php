<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuruMapel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'guru_mapel';
    protected $primaryKey = 'kd_gumap';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_gumap';
    }

    protected $keyType = 'string';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'kd_mapel');
    }
}
