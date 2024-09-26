<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefPekerjaanTable extends Migration
{
    public function up()
    {
        Schema::create('ref_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100); // Misalnya: Petani, Pedagang, PNS, dll.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ref_pekerjaan');
    }
}
