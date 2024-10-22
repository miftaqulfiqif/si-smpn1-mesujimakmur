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
        Schema::create('periode_daftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('jml_pendaftar');
            $table->integer('kuota');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('tidak aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_daftars');
    }
};