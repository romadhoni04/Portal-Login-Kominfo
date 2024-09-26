<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelsTable extends Migration
{
    public function up()
    {
        Schema::create('kels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kel', 100);
            $table->unsignedBigInteger('no_kec');
            $table->foreign('no_kec')->references('id')->on('kecs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kels');
    }
}
