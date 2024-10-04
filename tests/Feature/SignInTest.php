<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DocumentTypeSeeder;
use Database\Seeders\GenderSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignInTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DocumentTypeSeeder::class);
        $this->seed(GenderSeeder::class);
    }

    /** @test */
    public function it_signs_in_a_user_with_valid_credentials()
    {
        // Arrange: Crear un usuario en la base de datos
        $user = User::factory()->create([
            'email'    => 'test@example.com',
            'password' => bcrypt('password123'), // Asegúrate de encriptar la contraseña
        ]);

        // Act: Realizar una solicitud de inicio de sesión
        $response = $this->postJson('/api/auth/sign-in', [
            'email'    => 'test@example.com',
            'password' => 'password123',
        ]);

        // Assert: Verificar que la respuesta sea exitosa
        $response->assertStatus(200);
        $this->assertArrayHasKey('data', $response->json());
    }

    /** @test */
    public function it_returns_unauthorized_when_sign_in_with_invalid_credentials()
    {
        // Act: Intentar iniciar sesión con credenciales inválidas
        $response = $this->postJson('/api/auth/sign-in', [
            'email'    => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert: Verificar que la respuesta sea 401 Unauthorized
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthorized']);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        // Act: Realizar una solicitud de inicio de sesión con campos vacíos
        $response = $this->postJson('/api/auth/sign-in', []);

        // Assert: Verificar que la respuesta contenga errores de validación
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email', 'password']);
    }

    /** @test */
    public function it_validates_email_format()
    {
        // Act: Intentar iniciar sesión con un formato de correo electrónico inválido
        $response = $this->postJson('/api/auth/sign-in', [
            'email'    => 'invalidemail',
            'password' => 'password123',
        ]);

        // Assert: Verificar que la respuesta contenga un error de validación para el email
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }
}
