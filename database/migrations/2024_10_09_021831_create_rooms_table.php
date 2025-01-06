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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoryId')->nullable()->index();
            $table->foreignId('userId')->nullable()->index();
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('capacity');
            $table->integer('price')->nullable();
            $table->string('status')->enum(['approved', 'draft', 'closed'])->default('draft');
            $table->timestamps();

            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
