<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->string('kd_wali');
            $table->string('kd_guru');
            $table->string('nip');
            $table->string('tgl_lahir');
            $table->string('tingkat');
            $table->string('kd_prodi');
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
        Schema::dropIfExists('walis');
    }
}
