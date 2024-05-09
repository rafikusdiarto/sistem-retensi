<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cara_pemusnahan');
            $table->date('tanggal_pemusnahan');
            $table->string('waktu_pemusnahan');
            $table->string('lokasi_pemusnahan');
            $table->string('name');
            $table->string('nip_petugas');
            $table->string('ketua_rm');
            $table->string('nip_ketua_rm');
            $table->string('direktur');
            $table->string('nip_direktur');
            $table->string('no_surat');
            $table->string('jumlah_rm');
            $table->string('rentang_tahun');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
