<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_is_available(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Crear cuenta');
    }

    public function test_user_can_register_with_profile_contact_fields(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Laura Gómez',
            'email' => 'laura@example.com',
            'phone' => '+34 612 345 678',
            'city' => 'Madrid',
            'date_of_birth' => '1997-03-14',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $user = User::where('email', 'laura@example.com')->firstOrFail();

        $response->assertRedirect(route('profile'));
        $this->assertAuthenticatedAs($user);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertSame('Madrid', $user->city);
        $this->assertSame('1997-03-14', $user->date_of_birth->toDateString());
    }
}
