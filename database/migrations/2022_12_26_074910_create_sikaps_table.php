<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSikapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sikap', function (Blueprint $table) {
            $table->string('kd_nsikap');
            $table->string('kd_siswa');
            $table->string('kd_tahun');
            $table->string('tingkat');
            $table->string('semester');
            $table->string('sikap');
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
        Schema::dropIfExists('sikaps');
    }
}
