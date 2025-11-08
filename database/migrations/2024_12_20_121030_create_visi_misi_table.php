<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visi_misi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('visi');
            $table->json('misi'); // Format JSON untuk menyimpan daftar misi
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misi');
    }
    

    
};
