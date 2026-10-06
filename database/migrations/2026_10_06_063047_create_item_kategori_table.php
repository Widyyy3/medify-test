<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_kategori', function (Blueprint $table) {
            $table->id();

            $table->foreignId('master_item_id')
                ->constrained('master_items')
                ->onDelete('cascade');

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['master_item_id', 'kategori_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_kategori');
    }
};