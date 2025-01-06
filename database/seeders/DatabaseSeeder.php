<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perangkat;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create perangkat data
        Perangkat::factory()->create([
            'nama' => 'AC Ruang Meeting',
            'kategori' => 'AC',
            'daya' => 1000,
            'status' => 'aktif',
        ]);

        // Create random perangkat
        Perangkat::factory(10)->create();
    }
}
