<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 pengguna biasa (role = user)
        User::factory(5)->user()->create();

        // Membuat 5 pengguna admin (role = admin)
        User::factory(4)->admin()->create();

        // Membuat 3 pengguna pemilik (role = pemilik)
        User::factory(1)->pemilik()->create();

        // // Membuat 2 pengguna dengan email yang tidak terverifikasi
        // User::factory(2)->unverified()->create();
    }
}
