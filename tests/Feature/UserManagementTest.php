<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_cannot_access_user_management_routes(): void
    {
        $user = User::factory()->create();
        $targetUser = User::factory()->create();

        $this->actingAs($user);

        $this->get(route('users.index'))->assertForbidden();
        $this->get(route('users.create'))->assertForbidden();
        $this->post(route('users.store'), [
            'name' => 'Novo Usuario',
            'email' => 'novo@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertForbidden();
        $this->get(route('users.edit', $targetUser))->assertForbidden();
        $this->put(route('users.update', $targetUser), [
            'name' => 'Alterado',
            'email' => 'alterado@example.com',
        ])->assertForbidden();
        $this->put(route('users.updateProfile', $targetUser), [
            'type' => 'pf',
            'address' => 'Rua Teste',
        ])->assertForbidden();
        $this->put(route('users.updateRoles', $targetUser), [
            'roles' => [],
        ])->assertForbidden();
        $this->put(route('users.updateInterests', $targetUser), [
            'interests' => [
                ['name' => 'Futebol'],
            ],
        ])->assertForbidden();
        $this->delete(route('users.destroy', $targetUser))->assertForbidden();
    }

    public function test_admin_can_create_user(): void
    {
        $admin = $this->createAdminUser();

        $this->actingAs($admin)
            ->post(route('users.store'), [
                'name' => 'Novo Usuario',
                'email' => 'novo@example.com',
                'password' => 'password123',
                'password_confirmation' => 'password123',
            ])
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', [
            'email' => 'novo@example.com',
            'name' => 'Novo Usuario',
        ]);
    }

    public function test_admin_can_update_basic_details_without_changing_password(): void
    {
        $admin = $this->createAdminUser();
        $targetUser = User::factory()->create([
            'password' => 'password123',
        ]);
        $originalPassword = $targetUser->password;

        $this->actingAs($admin)
            ->put(route('users.update', $targetUser), [
                'name' => 'Nome Editado',
                'email' => 'editado@example.com',
                'password' => '',
                'password_confirmation' => '',
            ])
            ->assertRedirect(route('users.index'));

        $targetUser->refresh();

        $this->assertSame('Nome Editado', $targetUser->name);
        $this->assertSame('editado@example.com', $targetUser->email);
        $this->assertSame($originalPassword, $targetUser->password);
    }

    public function test_admin_can_update_profile(): void
    {
        $admin = $this->createAdminUser();
        $targetUser = User::factory()->create();

        $this->actingAs($admin)
            ->put(route('users.updateProfile', $targetUser), [
                'type' => 'pf',
                'address' => 'Rua Central 123',
            ])
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => $targetUser->id,
            'type' => 'pf',
            'address' => 'Rua Central 123',
        ]);
    }

    public function test_admin_can_sync_and_clear_roles(): void
    {
        $admin = $this->createAdminUser();
        $targetUser = User::factory()->create();
        $userRole = Role::create(['name' => 'user']);
        $managerRole = Role::create(['name' => 'manager']);

        $this->actingAs($admin)
            ->put(route('users.updateRoles', $targetUser), [
                'roles' => [$userRole->id, $managerRole->id],
            ])
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('role_user', [
            'user_id' => $targetUser->id,
            'role_id' => $userRole->id,
        ]);
        $this->assertDatabaseHas('role_user', [
            'user_id' => $targetUser->id,
            'role_id' => $managerRole->id,
        ]);

        $this->actingAs($admin)
            ->put(route('users.updateRoles', $targetUser), [])
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('role_user', [
            'user_id' => $targetUser->id,
            'role_id' => $userRole->id,
        ]);
        $this->assertDatabaseMissing('role_user', [
            'user_id' => $targetUser->id,
            'role_id' => $managerRole->id,
        ]);
    }

    public function test_admin_can_replace_interests(): void
    {
        $admin = $this->createAdminUser();
        $targetUser = User::factory()->create();
        $targetUser->interests()->createMany([
            ['name' => 'Futebol'],
            ['name' => 'Fórmula 1'],
        ]);

        $this->actingAs($admin)
            ->put(route('users.updateInterests', $targetUser), [
                'interests' => [
                    ['name' => 'Futebol'],
                ],
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('user_interests', [
            'user_id' => $targetUser->id,
            'name' => 'Futebol',
        ]);
        $this->assertDatabaseMissing('user_interests', [
            'user_id' => $targetUser->id,
            'name' => 'Fórmula 1',
        ]);
    }

    public function test_admin_cannot_delete_self(): void
    {
        $admin = $this->createAdminUser();

        $this->actingAs($admin)
            ->delete(route('users.destroy', $admin))
            ->assertForbidden();

        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
        ]);
    }

    private function createAdminUser(): User
    {
        $admin = User::factory()->create();
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $admin->roles()->sync([$adminRole->id]);

        return $admin;
    }
}