<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca o usuario de referencia para vincular as roles.
        $user = User::where('email', 'test@example.com')->first();

        if (! $user) {
            return;
        }

        // Recupera apenas as roles esperadas para a vinculacao na pivot.
        $roleIds = Role::whereIn('name', ['admin', 'user'])->pluck('id')->all();

        if (empty($roleIds)) {
            return;
        }

        // Adiciona vinculos sem remover outros papeis ja associados ao usuario.
        $user->roles()->syncWithoutDetaching($roleIds);
    }
}
