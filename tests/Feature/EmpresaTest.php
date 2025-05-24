<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_crear_empresa()
    {
        $response = $this->postJson('/api/empresas', [
            'nit' => '123456789',
            'nombre' => 'Acme Inc.',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '3001234567',
        ]);

        $response->assertStatus(201)
                ->assertJsonFragment(['nombre' => 'Acme Inc.']);
    }

}
