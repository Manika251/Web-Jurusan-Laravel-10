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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Juara 1 Lomba Web
            $table->string('student_name')->nullable(); // 
            $table->enum('level', ['Jurusan', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional'])->default('Jurusan');
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Foto piala/sertifikat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
