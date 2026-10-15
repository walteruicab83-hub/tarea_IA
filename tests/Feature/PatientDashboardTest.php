<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_route_is_available(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_profile_route_is_available(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/perfil')
            ->assertStatus(200);
    }

    public function test_profile_route_requires_authentication(): void
    {
        $this->get('/profile')->assertRedirect(route('login'));
    }
}
