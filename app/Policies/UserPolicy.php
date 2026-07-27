<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        // Apenas administradores podem acessar a listagem de usuários.
        return $user->roles()->where('name', 'admin')->exists();
    }

    public function create(User $user): bool
    {
        // Apenas administradores podem criar novos usuários.
        return $user->roles()->where('name', 'admin')->exists();
    }

    public function edit(User $user, User $targetUser): bool
    {
        // A edição de qualquer usuário fica restrita ao papel de administrador.
        return $user->roles()->where('name', 'admin')->exists();
    }

    public function destroy(User $user, User $targetUser): bool
    {
        // O administrador pode excluir outros usuários, mas não a própria conta.
        return $user->roles()->where('name', 'admin')->exists() && ! $user->is($targetUser);
    }





}
