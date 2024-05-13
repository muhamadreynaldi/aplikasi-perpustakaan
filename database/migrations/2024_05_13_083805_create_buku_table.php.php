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
        Schema::create('buku', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')->references('id')->on('penulis');
            $table->unsignedBigInteger('id_rak');
            $table->foreign('id_rak')->references('id')->on('rak');
            $table->bigInteger('no_buku')->primary();
            $table->string('judul', 200);
            $table->string('edisi', 50);
            $table->date('tahun');
            $table->string('penerbit', 100);
            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
