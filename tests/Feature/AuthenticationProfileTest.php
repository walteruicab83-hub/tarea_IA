<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_log_in_using_email_or_patient_identifier(): void
    {
        $user = User::factory()->create([
            'affiliate' => 'PAC-2048',
            'password' => 'current-password',
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'current-password',
        ])->assertRedirect(route('profile'))
            ->assertSessionHas('status');

        $this->post(route('logout'))->assertRedirect(route('login'));
        $this->assertGuest();

        $this->post(route('login'), [
            'identifier' => 'PAC-2048',
            'password' => 'current-password',
        ])->assertRedirect(route('profile'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_update_profile_without_changing_password(): void
    {
        $user = User::factory()->create([
            'password' => 'current-password',
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Laura Gómez',
                'email' => $user->email,
                'phone' => '+34 612 345 678',
                'city' => 'Madrid',
                'date_of_birth' => '1997-03-14',
                'blood_type' => 'A+',
                'insurance' => 'Sanitas',
                'affiliate' => 'PAC-2048',
                'medical_notes' => 'Sin alergias conocidas.',
                'preferences' => ['Recordatorio por SMS'],
                'password' => '',
                'password_confirmation' => '',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status');

        $this->assertSame('Laura Gómez', $user->fresh()->name);
        $this->assertTrue(Hash::check('current-password', $user->fresh()->password));
        $this->assertSame(['Recordatorio por SMS'], $user->fresh()->preferences);
    }

    public function test_authenticated_user_can_open_profile_editor(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('Editar perfil')
            ->assertSee('Guardar cambios');
    }

    public function test_profile_update_rejects_another_users_email(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();

        $this->actingAs($user)
            ->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'name' => $user->name,
                'email' => $other->email,
                'password' => '',
                'password_confirmation' => '',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHasErrors('email');
    }

    public function test_profile_update_can_clear_all_preferences(): void
    {
        $user = User::factory()->create([
            'preferences' => ['Recordatorio por SMS'],
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => $user->name,
                'email' => $user->email,
                'preferences' => [],
            ])
            ->assertRedirect(route('profile.edit'));

        $this->assertSame([], $user->fresh()->preferences);
    }
}
