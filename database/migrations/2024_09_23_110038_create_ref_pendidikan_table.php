<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefPendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('ref_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100); // Misalnya: SD, SMP, SMA, S1
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ref_pendidikan');
    }
}
