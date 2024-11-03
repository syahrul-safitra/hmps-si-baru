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
        Schema::create('partisipasi_kegiatans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kegiatan_id')->
                constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('anggota_id')->constrained()
                ->cascadeOnUpdate()
                ->onDelete('restrict');

            $table->enum('status', ['_', 'hadir', 'izin', 'alpa'])->default('_');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partisipasi_kegiatans');
    }
};
