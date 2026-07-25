<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria o usuario base apenas uma vez para evitar duplicidade em re-seeds.
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                // O cast "hashed" no model converte a senha automaticamente.
                'password' => 'password',
            ]
        );
    }
}
