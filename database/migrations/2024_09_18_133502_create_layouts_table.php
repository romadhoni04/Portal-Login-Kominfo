<?php

// database/migrations/xxxx_xx_xx_create_layouts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('css_properties');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layouts');
    }
}
