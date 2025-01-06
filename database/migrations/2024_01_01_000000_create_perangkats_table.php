<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Lampu', 'AC', 'Komputer']);
            $table->integer('daya');
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->text('keterangan')->nullable();
            $table->softDeletes(); // Untuk fitur soft delete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkats');
    }
};
