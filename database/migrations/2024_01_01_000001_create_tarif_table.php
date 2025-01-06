<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif', function (Blueprint $table) {
            $table->id();
            $table->decimal('harga_per_kwh', 10, 2);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        // Insert default tarif
        DB::table('tarif')->insert([
            'harga_per_kwh' => 1445.00,
            'keterangan' => 'Tarif Dasar Listrik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif');
    }
};
