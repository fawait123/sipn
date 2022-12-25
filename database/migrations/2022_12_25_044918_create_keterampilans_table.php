<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterampilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_keterampilan', function (Blueprint $table) {
            $table->string('kd_nk');
            $table->string('kd_siswa');
            $table->string('kd_tahun');
            $table->string('tingkat');
            $table->string('semester');
            $table->integer('proses');
            $table->integer('produk');
            $table->integer('proyek');
            $table->text('deskripsi_k');
            $table->string('kd_guru');
            $table->timestamps();
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterampilans');
    }
}
