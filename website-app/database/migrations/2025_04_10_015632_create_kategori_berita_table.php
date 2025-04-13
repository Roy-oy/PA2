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
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id();
            $table->enum('nama_kategori', ['Penyakit dan Pengobatan', 'Gizi dan Kesehatan Keluarga', 'Pola Hidup Sehat']);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_berita');
    }
};
