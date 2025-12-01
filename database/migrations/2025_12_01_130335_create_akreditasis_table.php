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
    Schema::create('akreditasis', function (Blueprint $table) {
        $table->id();
        $table->string('judul'); // Misal: "Akreditasi Utama"
        $table->string('peringkat'); // Misal: "Unggul"
        $table->string('tahun'); // Misal: "2024"
        $table->string('file_sertifikat')->nullable(); // Menyimpan nama file gambar
        $table->longText('deskripsi')->nullable(); // Untuk teks panjang (seperti editor di bawah gambar)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasis');
    }
};
