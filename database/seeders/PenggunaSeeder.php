<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\AutoCode;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::create([
            'kd_pengguna'=>AutoCode::code('ADM'),
            'nm_pengguna'=>'Admin',
            'username'=>'admin',
            'password'=>md5('12345678'),
            'akses'=>'admin',
            'aktif'=>true,
        ]);
    }
}
