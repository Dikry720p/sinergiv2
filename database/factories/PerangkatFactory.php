<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerangkatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Lampu Ruang Meeting', 'AC Ruang Staff', 'Komputer Admin', 'Lampu Koridor']),
            'kategori' => fake()->randomElement(['Lampu', 'AC', 'Komputer']),
            'daya' => fake()->numberBetween(10, 1000),
            'status' => fake()->randomElement(['aktif', 'nonaktif']),
            'keterangan' => fake()->optional()->sentence(),
        ];
    }
}
