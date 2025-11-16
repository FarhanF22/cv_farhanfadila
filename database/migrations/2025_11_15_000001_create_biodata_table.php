<?php

use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->text('deskripsi_singkat')->nullable(); // Pastikan tipe data sesuai
            $table->string('email')->nullable(); // Pastikan kolom ada
            $table->string('telepon')->nullable(); // Pastikan kolom ada
            $table->string('alamat')->nullable(); // Pastikan kolom ada
            $table->string('foto_path')->nullable(); // Pastikan kolom ada
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};