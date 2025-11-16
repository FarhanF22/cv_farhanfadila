<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            // Kunci Asing (Relasi ke Biodata)
            $table->foreignId('biodata_id')->constrained('biodata')->onDelete('cascade');
            $table->string('jenjang');
            $table->string('institusi');
            $table->string('jurusan')->nullable();
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};