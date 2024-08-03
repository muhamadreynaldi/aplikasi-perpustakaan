<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sanksi', function (Blueprint $table) {
            // Add the columns if they don't exist
            if (!Schema::hasColumn('sanksi', 'denda_harian')) {
                $table->integer('denda_harian')->default(0);
            }

            if (!Schema::hasColumn('sanksi', 'jumlah_denda')) {
                $table->integer('jumlah_denda')->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('sanksi', function (Blueprint $table) {
            $table->dropColumn(['denda_harian', 'jumlah_denda']);
        });
    }
};
