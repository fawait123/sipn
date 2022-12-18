<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->integer('kd_guru');
            $table->string('nip');
            $table->string('nm_guru');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('agama');
            $table->text('alamat');
            $table->string('kd_mapel');
            $table->string('tingkat');
            $table->string('kd_admin');
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
        Schema::dropIfExists('gurus');
    }
}
