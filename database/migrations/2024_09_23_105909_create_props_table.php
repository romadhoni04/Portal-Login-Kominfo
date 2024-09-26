<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropsTable extends Migration
{
    public function up()
    {
        Schema::create('props', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prop', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('props');
    }
}
