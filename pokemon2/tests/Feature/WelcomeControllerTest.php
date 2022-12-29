<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(500);
    }

    public function testIndex()
    {
        $response = $this->get('/statistiquesMatchs');
        $response->assertStatus(500);
    }

    public function testIndex2()
    {
        $response = $this->get('/listePokemons');
        $response->assertStatus(500);
    }
}
