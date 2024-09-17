<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofolioImagesTable extends Migration
{
    public function up()
    {
        Schema::create('portofolio_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portofolio_id');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('portofolio_id')->references('id')->on('portofolios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portofolio_images');
    }
}
