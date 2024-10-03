<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kepala_rumah_tangga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('dawis_id')->constrained('dawis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kepala_rumah_tangga');
    }
};
