<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabsTable extends Migration
{
    public function up()
    {
        Schema::create('kabs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kab', 100);
            $table->unsignedBigInteger('no_prop');
            $table->foreign('no_prop')->references('id')->on('props')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kabs');
    }
}
