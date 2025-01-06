<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perangkat;

class PerangkatSeeder extends Seeder
{
    public function run(): void
    {
        // Data spesifik
        $perangkats = [
            [
                'nama' => 'AC Ruang Meeting',
                'kategori' => 'AC',
                'daya' => 1000,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Lampu Koridor',
                'kategori' => 'Lampu',
                'daya' => 40,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Komputer Admin',
                'kategori' => 'Komputer',
                'daya' => 400,
                'status' => 'aktif',
            ]
        ];

        foreach ($perangkats as $perangkat) {
            Perangkat::factory()->create($perangkat);
        }

        // Data random
        Perangkat::factory(7)->create();
    }
}
