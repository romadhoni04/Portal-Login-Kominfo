<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecsTable extends Migration
{
    public function up()
    {
        Schema::create('kecs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kec', 100);
            $table->unsignedBigInteger('no_kab');
            $table->foreign('no_kab')->references('id')->on('kabs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kecs');
    }
}
