<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('kd_siswa')->key();
            $table->string('nis');
            $table->string('nm_siswa');
            $table->string('tgl_lahir');
            $table->string('jk');
            $table->string('agama');
            $table->string('alamat');
            $table->string('tingkat');
            $table->string('nm_ortu');
            $table->string('kd_prodi');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
