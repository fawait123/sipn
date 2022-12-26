<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_absen', function (Blueprint $table) {
            $table->string('kd_nabsen');
            $table->string('kd_siswa');
            $table->string('kd_th');
            $table->string('tingkat');
            $table->string('semester');
            $table->string('sakit');
            $table->string('izin');
            $table->string('tanpa_ket');
            $table->string('kd_wali');
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
        Schema::dropIfExists('absens');
    }
}
