<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->string('kd_tahun');
            $table->string('th_ajaran');
            $table->string('bobot_nh');
            $table->string('bobot_uts');
            $table->string('bobot_uas');
            $table->string('bobot_proses');
            $table->string('bobot_product');
            $table->string('bobot_proyek');
            $table->string('kd_admin');
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
        Schema::dropIfExists('ajarans');
    }
}
