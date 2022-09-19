<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CursoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/curso');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $curso = new Curso();
        $curso->nome = fake('pt_BR')->name();
        $curso->descricao = fake('pt_BR')->text(255);
        $curso->preco = fake()->randomFloat(2,0,10000);
        $curso->maximo_alunos = rand(0,100);
        $response = $this->post("/api/curso", $curso->toArray());
        $response->assertStatus(201);
    }

    public function test_show()
    {
        $curso = Curso::query()->inRandomOrder()->first();
        $response = $this->get("/api/curso/{$curso->id}");
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $curso = Curso::query()->inRandomOrder()->first();
        $curso->nome = fake('pt_BR')->name();
        $curso->preco = fake()->randomFloat(2,0,10000);
        $response = $this->put("/api/curso/{$curso->id}", $curso->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $curso = Curso::query()->inRandomOrder()->first();
        $response = $this->delete("/api/curso/{$curso->id}");
        $response->assertStatus(204);
    }
}
