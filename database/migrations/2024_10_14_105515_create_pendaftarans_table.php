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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nim');
            $table->string('no_wa');
            $table->year('tahun');
            $table->string('semester');
            $table->string('kelas');
            $table->string('file_ukt');
            $table->string('file_ktm');
            $table->string('file_cv');
            $table->string('file_srt_penyataan');
            $table->string('file_ss_instagram');
            $table->enum('status', ['diproses', 'lolos_screening', 'tidak_memenuhi_syarat', 'ditolak', 'diterima'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
