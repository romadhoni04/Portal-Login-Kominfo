<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIdPendudukToIdInDataPendudukTable extends Migration
{
    public function up()
    {
        Schema::table('data_penduduk', function (Blueprint $table) {
            $table->renameColumn('id_penduduk', 'id');
        });
    }

    public function down()
    {
        Schema::table('data_penduduk', function (Blueprint $table) {
            $table->renameColumn('id', 'id_penduduk');
        });
    }
}
