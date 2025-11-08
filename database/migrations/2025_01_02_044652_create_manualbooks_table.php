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
    Schema::create('manualbooks', function (Blueprint $table) {
        $table->id();
        $table->string('kategori_dokumen');
        $table->string('url_sistem_informasi');
        $table->string('link_sistem_informasi');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manualbooks');
    }
};
