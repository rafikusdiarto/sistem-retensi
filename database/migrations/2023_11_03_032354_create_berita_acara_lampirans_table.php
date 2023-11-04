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
        Schema::create('berita_acara_lampirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('berita_acara_id');
            $table->string('nama_file');
            $table->string('path_file');
            $table->timestamps();

            $table->foreign('berita_acara_id')
            ->references('id')->on('berita_acaras')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acara_lampirans');
    }
};
