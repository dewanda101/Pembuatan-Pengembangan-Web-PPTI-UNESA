<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsArticlesTable extends Migration // Nama kelas diubah menjadi lebih spesifik
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel news
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Primary key (ID)
            $table->string('title'); // Judul berita
            $table->text('content'); // Konten berita
            $table->unsignedBigInteger('views')->default(0); // Jumlah views
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key untuk kategori
            $table->timestamps(); // created_at dan updated_at otomatis
            
            // Menambahkan foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // Membuat tabel categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key (ID)
            $table->string('name'); // Nama kategori
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // Menghapus foreign key sebelum menghapus tabel
            $table->dropForeign(['category_id']);
        });
        
        Schema::dropIfExists('news'); // Hapus tabel news
        Schema::dropIfExists('categories'); // Hapus tabel categories
    }
}
