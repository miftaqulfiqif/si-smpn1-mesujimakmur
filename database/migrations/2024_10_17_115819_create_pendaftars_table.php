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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_periode')->constrained('periode_daftars')->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('nisn');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('jml_saudara');
            $table->integer('anak_ke');
            $table->string('no_hp');
            $table->enum('kebutuhan_khusus', ['Tidak', 'Netra', 'Rungu', 'Grahita Ringan', 'Grahita Sedang', 'Daksa Ringan', 'Daksa Sedang', 'Laras', 'Wicara', 'Tuna Guna', 'Hiper aktif', 'Cerdas Istimewa', 'Budaya', 'Lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
