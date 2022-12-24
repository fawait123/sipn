<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Authenticatable
{
    use SoftDeletes,HasApiTokens, HasFactory, Notifiable;
    protected $table = 'pengguna';
    protected $primaryKey = 'kd_pengguna';

    protected $guarded = ['created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'kd_pengguna';
    }
    protected $keyType = 'string';
}
