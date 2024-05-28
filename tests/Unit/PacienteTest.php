<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class PacienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_pacientes()
    {
        $user = "isaias.feeney@example.net";

        // Gera um token JWT para o usuário
        $token = JWTAuth::fromUser($user);

        // Define o token na requisição
        $this->withHeader('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzE2ODU3MjA3LCJleHAiOjE3MTY4NjA4MDcsIm5iZiI6MTcxNjg1NzIwNywianRpIjoiemp4THk5Rkw2MHluWVBnUSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.il4e6m-x8IJd9W_6l1L8P3ypvC5n9FoHHdVFFF-cmGY');

        // Cria alguns pacientes para o teste
        Paciente::factory()->count(3)->create();

        // Faz uma requisição GET autenticada ao endpoint
        $response = $this->getJson('/api/pacientes');

        // Verifica se o status da resposta é 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta contém os pacientes criados
        $response->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_paciente()
    {
        $data = [
            'pac_nome' => 'John Doe',
            'pac_dataNascimento' => '1980-01-01',
        ];

        $response = $this->postJson('/api/pacientes', $data);

        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('pacientes', $data);
    }

    /** @test */
    public function it_can_show_a_paciente()
    {
        $paciente = Paciente::factory()->create();

        $response = $this->getJson("/api/pacientes/{$paciente->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'pac_nome' => $paciente->pac_nome,
            'pac_dataNascimento' => $paciente->pac_dataNascimento->toDateString(),
        ]);
    }

    /** @test */
    public function it_can_update_a_paciente()
    {
        $paciente = Paciente::factory()->create();

        $data = [
            'pac_nome' => 'Jane Doe',
            'pac_dataNascimento' => '1990-01-01',
            'pac_telefone' => '1234567890',
        ];

        $response = $this->putJson("/api/pacientes/{$paciente->id}", $data);

        $response->assertStatus(200);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('pacientes', $data);
    }

    /** @test */
    public function it_can_delete_a_paciente()
    {
        $paciente = Paciente::factory()->create();

        $response = $this->deleteJson("/api/pacientes/{$paciente->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('pacientes', ['id' => $paciente->id]);
    }
}
