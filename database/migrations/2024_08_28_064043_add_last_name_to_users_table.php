<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
<<<<<<< HEAD
            // Mengecek apakah kolom last_name sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable();
            }
=======
            // Menambahkan kolom last_name ke tabel users
            $table->string('last_name')->nullable();
>>>>>>> b2c8a8a2a6b61dcd35b5c06d1e2160f925f13683
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom last_name dari tabel users jika rollback dilakukan
            $table->dropColumn('last_name');
        });
    }
};
