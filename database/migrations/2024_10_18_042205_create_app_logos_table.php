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
        Schema::create('app_logos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('editor')->constrained('users')->onDelete('cascade');
            $table->string('image_url');
            $table->string('alt_text')->nullable()->default('app_logo');
            $table->enum('type', ['favicon', 'logo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_logos');
    }
};