<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefShdkTable extends Migration
{
    public function up()
    {
        Schema::create('ref_shdk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_shdk');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ref_shdk');
    }
}
