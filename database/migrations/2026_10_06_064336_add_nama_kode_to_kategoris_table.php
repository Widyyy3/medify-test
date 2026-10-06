<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('kode')->unique()->after('nama');
        });
    }

    public function down()
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->dropUnique(['kode']);
            $table->dropColumn(['nama', 'kode']);
        });
    }
};