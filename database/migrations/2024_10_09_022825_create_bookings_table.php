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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roomId')->nullable()->index();
            $table->foreignId('userId')->nullable()->index();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->date('bookingDate')->nullable();
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->timestamps();

            $table->foreign('roomId')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
