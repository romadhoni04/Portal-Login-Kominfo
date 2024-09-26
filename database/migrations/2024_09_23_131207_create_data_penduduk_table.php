<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPendudukTable extends Migration
{
    public function up()
    {
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 20);
            $table->string('no_nik', 20);
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('shdk');
            $table->unsignedBigInteger('status_kawin');
            $table->unsignedBigInteger('pendidikan');
            $table->unsignedBigInteger('pekerjaan');
            $table->integer('difabel')->default(0);
            $table->integer('keg_pancasila')->default(0);
            $table->integer('keg_gotong_royong')->default(0);
            $table->integer('keg_pendidikan')->default(0);
            $table->integer('keg_koperasi')->default(0);
            $table->integer('keg_pangan')->default(0);
            $table->integer('keg_sandang')->default(0);
            $table->integer('keg_kesehatan')->default(0);
            $table->integer('keg_perencanaan_sehat')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('shdk')->references('id')->on('ref_shdk');
            $table->foreign('status_kawin')->references('id')->on('ref_perkawinan');
            $table->foreign('pendidikan')->references('id')->on('ref_pendidikan');
            $table->foreign('pekerjaan')->references('id')->on('ref_pekerjaan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_penduduk');
    }
}
