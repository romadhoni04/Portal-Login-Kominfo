<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKeluargaAkumulasiTable extends Migration
{
    public function up()
    {
        Schema::create('data_keluarga_akumulasi', function (Blueprint $table) {
            $table->unsignedBigInteger('no_kk'); // Nomor Kartu Keluarga (Foreign Key)
            $table->integer('balita')->default(0);
            $table->integer('pus')->default(0);
            $table->integer('wus')->default(0);
            $table->integer('tiga_buta')->default(0);
            $table->integer('ibu_hamil')->default(0);
            $table->integer('ibu_menyusui')->default(0);
            $table->integer('lansia')->default(0);
            $table->integer('makanan_pokok')->default(0);
            $table->string('makanan_pokok_lain', 100)->nullable(); // varchar
            $table->integer('jumlah_keluarga')->default(0);
            $table->integer('jumlah_keluarga_jumlah')->default(0);
            $table->integer('sumber_air_keluarga')->default(0); // 
            $table->string('sumber_air_keluarga_lain', 100)->nullable(); // varchar
            $table->integer('tempat_sampah_keluarga')->default(0); // 
            $table->integer('saluran_air_limbah')->default(0); // 
            $table->integer('stiker_pkk')->default(0);
            $table->integer('kriteria_rumah')->default(0);
            $table->integer('aktivitas_up2k')->default(0);
            $table->string('aktivitas_up2k_lain', 100)->nullable();
            $table->integer('aktivitas_usaha_lingkungan')->default(0);
            $table->integer('memiliki_tabungan')->default(0);
            $table->timestamps();

            // Foreign Key
            $table->foreign('no_kk')->references('no_kk')->on('data_keluarga')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_keluarga_akumulasi');
    }
}
