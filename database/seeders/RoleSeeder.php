<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = collect(['admin', 'user'])->map(function (string $name) {
            return Role::firstOrCreate(['name' => $name]);
        });

        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            $user->roles()->syncWithoutDetaching($roles->pluck('id')->all());
        }
    }
}
