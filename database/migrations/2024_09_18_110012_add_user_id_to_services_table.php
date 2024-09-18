<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Menambahkan foreign key
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
