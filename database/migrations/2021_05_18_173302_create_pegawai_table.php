<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('nip', 18);
            $table->string('nik', 16);
            $table->string('nama', 35);
            $table->char('golongan', 5);
            $table->unsignedBigInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatan');
            $table->char('pendidikan', 5);
            $table->text('alamat');
            $table->string('no_hp', 14);
            $table->date('tahun_diangkat');
            $table->date('tahun_menjabat');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
