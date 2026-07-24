<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleSeedersTest extends TestCase
{
    use RefreshDatabase;

    public function test_default_roles_and_role_assignments_are_seeded(): void
    {
        $this->artisan('db:seed');

        $this->assertDatabaseHas('roles', ['name' => 'admin']);
        $this->assertDatabaseHas('roles', ['name' => 'user']);

        $user = User::where('email', 'test@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->roles()->where('name', 'admin')->exists());
        $this->assertTrue($user->roles()->where('name', 'user')->exists());
    }
}
