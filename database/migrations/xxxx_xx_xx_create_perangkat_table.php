<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perangkat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perangkat');
            $table->decimal('konsumsi_energi', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perangkat');
    }
};
