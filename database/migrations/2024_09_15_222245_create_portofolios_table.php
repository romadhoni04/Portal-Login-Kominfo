<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('client');
            $table->date('project_date');
            $table->string('project_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portofolios');
    }
}
