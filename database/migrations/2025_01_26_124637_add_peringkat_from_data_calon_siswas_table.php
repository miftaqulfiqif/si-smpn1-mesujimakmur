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
        Schema::table('data_calon_siswas', function (Blueprint $table) {
            $table->integer('peringkat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_calon_siswas', function (Blueprint $table) {
            $table->dropColumn('peringkat');
        });
    }
};
