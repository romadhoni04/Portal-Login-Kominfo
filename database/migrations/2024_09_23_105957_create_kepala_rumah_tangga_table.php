<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepalaRumahTanggaTable extends Migration
{
    public function up()
    {
        Schema::create('kepala_rumah_tangga', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->unsignedBigInteger('dawis_id');
            $table->foreign('dawis_id')->references('id')->on('dawis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepala_rumah_tangga');
    }
}
