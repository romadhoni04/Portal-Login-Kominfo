<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPendudukTable extends Migration
{
    public function up()
    {
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->string('no_kk');
            $table->string('no_ktp');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('shdk');
            $table->unsignedBigInteger('status_kawin');
            $table->unsignedBigInteger('pendidikan');
            $table->unsignedBigInteger('pekerjaan');
            $table->integer('difabel')->nullable();
            $table->integer('keg_pancasila')->nullable();
            $table->integer('keg_gotong_royong')->nullable();
            $table->integer('keg_pendidikan')->nullable();
            $table->integer('keg_koperasi')->nullable();
            $table->integer('keg_pangan')->nullable();
            $table->integer('keg_sandang')->nullable();
            $table->integer('keg_kesehatan')->nullable();
            $table->integer('keg_perencanaan_sehat')->nullable();
            $table->text('keterangan')->nullable();

            $table->foreign('shdk')->references('id')->on('ref_shdk')->onDelete('cascade');
            $table->foreign('status_kawin')->references('id')->on('ref_perkawinan')->onDelete('cascade');
            $table->foreign('pendidikan')->references('id')->on('ref_pendidikan')->onDelete('cascade');
            $table->foreign('pekerjaan')->references('id')->on('ref_pekerjaan')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('data_penduduk');
    }
}
