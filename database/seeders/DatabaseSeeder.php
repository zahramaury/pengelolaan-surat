<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            "name" => "Tata Usaha",
            "email" => "tatausaha@gmail.com",
            //hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi/dibaca orang lain
            // hash -> bcrypt
            "password" => Hash::make('tatausaha'),
            "role" => "staff",
        ]);
        User::create([
            "name" => "Guru",
            "email" => "guru@gmail.com",
            "password" => Hash::make('guru'),
            "role" => "guru",
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
