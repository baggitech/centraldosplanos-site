<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Garante que as roles padrao existam sem criar registros repetidos.
        collect(['admin', 'user'])->each(function (string $name) {
            Role::firstOrCreate(['name' => $name]);
        });
    }
}
