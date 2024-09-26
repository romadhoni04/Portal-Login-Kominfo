<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDawisTable extends Migration
{
    public function up()
    {
        Schema::create('dawis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dawis', 100);
            $table->integer('rt');
            $table->integer('rw');
            $table->string('dusun', 100)->nullable();
            $table->unsignedBigInteger('no_kel');
            $table->unsignedBigInteger('no_kec');
            $table->unsignedBigInteger('no_kab');
            $table->unsignedBigInteger('no_prop');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dawis');
    }
}
