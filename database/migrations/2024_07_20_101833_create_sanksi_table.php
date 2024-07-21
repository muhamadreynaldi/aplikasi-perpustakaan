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
        Schema::create('sanksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggota');
            $table->unsignedBigInteger('id_peminjaman');
            $table->foreign('id_peminjaman')->references('id')->on('peminjaman');
            $table->integer('jumlah_denda');
            $table->enum('status', ['tunggakan', 'lunas'])->default('tunggakan')->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanksi');
    }
};
