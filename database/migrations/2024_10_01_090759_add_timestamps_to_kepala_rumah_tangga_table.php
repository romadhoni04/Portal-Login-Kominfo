<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToKepalaRumahTanggaTable extends Migration
{
    public function up()
    {
        Schema::table('kepala_rumah_tangga', function (Blueprint $table) {
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::table('kepala_rumah_tangga', function (Blueprint $table) {
            $table->dropTimestamps(); // Menghapus kolom created_at dan updated_at jika migrasi dibatalkan
        });
    }
}
