<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrakerinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_prakerin', function (Blueprint $table) {
            $table->string('kd_bpkl');
            $table->string('kd_siswa');
            $table->string('kd_th');
            $table->string('tingkat');
            $table->string('semester');
            $table->string('nm_du_di');
            $table->string('lokasi');
            $table->string('lama');
            $table->string('keterangan');
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
        Schema::dropIfExists('prakerins');
    }
}
