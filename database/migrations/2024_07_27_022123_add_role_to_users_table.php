<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Pastikan kolom belum ada sebelumnya
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('anggota');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():  void
    {
        Schema::table('users', function (Blueprint $table) {
            // Pastikan kolom ada sebelum dihapus
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
