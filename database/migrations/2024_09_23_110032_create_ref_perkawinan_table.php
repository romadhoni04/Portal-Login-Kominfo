<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefPerkawinanTable extends Migration
{
    public function up()
    {
        Schema::create('ref_perkawinan', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ref_perkawinan');
    }
}
