<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkstrakurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_ekstrakurikuler', function (Blueprint $table) {
            $table->string('kd_nekskul');
            $table->string('kd_siswa');
            $table->string('kd_tahun');
            $table->string('tingkat');
            $table->string('semester');
            $table->string('predikat');
            $table->string('kd_wali');
            $table->string('kd_ekskul');
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
        Schema::dropIfExists('ekstrakurikulers');
    }
}
