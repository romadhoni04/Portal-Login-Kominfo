<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKeluargaTable extends Migration
{
    public function up()
    {
        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->id('no_kk'); // Nomor Kartu Keluarga (Primary Key)
            $table->string('nama_kepala_keluarga', 100);
            $table->unsignedBigInteger('dawis_id');
            $table->unsignedBigInteger('no_kel');
            $table->unsignedBigInteger('no_kec');
            $table->unsignedBigInteger('no_kab');
            $table->unsignedBigInteger('no_prop');
            $table->unsignedBigInteger('kepala_rumah_tangga_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('dawis_id')->references('id')->on('dawis')->onDelete('cascade');
            $table->foreign('no_kel')->references('id')->on('kels')->onDelete('cascade');
            $table->foreign('no_kec')->references('id')->on('kecs')->onDelete('cascade');
            $table->foreign('no_kab')->references('id')->on('kabs')->onDelete('cascade');
            $table->foreign('no_prop')->references('id')->on('props')->onDelete('cascade');
            $table->foreign('kepala_rumah_tangga_id')->references('id')->on('kepala_rumah_tangga')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_keluarga');
    }
}
