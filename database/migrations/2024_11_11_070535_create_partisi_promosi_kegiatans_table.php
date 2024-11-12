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
        Schema::create('partisi_promosi_kegiatans', function (Blueprint $table) {
            $table->string('nim', 10);
            $table->unsignedBigInteger('promosi_kegiatan_id');
            $table->string('kode')->unique();

            $table->string('nama', 100);
            $table->string('semester', 20);
            $table->string('kelas', 1);
            $table->string('no_wa', 15);
            $table->enum('status', ['hadir', 'izin', 'alpha'])->nullable();

            $table->primary(['nim', 'promosi_kegiatan_id']);

            $table->foreign('promosi_kegiatan_id')
                ->references('id')
                ->on('promosi_kegiatans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partisi_promosi_kegiatans');
    }
};
