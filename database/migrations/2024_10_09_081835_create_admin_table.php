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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();  // Primary key (auto increment)
            $table->string('name');  // Kolom untuk nama admin
            $table->string('email')->unique();  // Kolom email yang unik
            $table->string('password');  // Kolom untuk menyimpan password
            $table->timestamps();  // Laravel otomatis membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');  // Menghapus tabel jika di-rollback
    }
};
 