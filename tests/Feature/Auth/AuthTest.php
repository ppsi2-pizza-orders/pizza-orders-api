<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testIfLoginSucceedsWithValidData()
    {
        $response = $this->json(
            'POST',
            '/auth/login',
            [
                'email' => 'admin@example.com',
                'password' => 'test123'
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                ],
                'messages',
                'meta'
            ]);
    }
    public function testIfLoginFailsWithInvalidData()
    {
        $response = $this->json(
            'POST',
            '/auth/login',
            [
                'email' => 'peperoni@example.com',
                'password' => 'test12223'
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	public function testIfLoginFailsWithoutEmail()
    {
        $response = $this->json(
            'POST',
            '/auth/login',
            [
                'email' => '',
                'password' => 'test123'
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfLoginFailsWithoutPassword()
    {
        $response = $this->json(
            'POST',
            '/auth/login',
            [
                'email' => 'admin@example.com',
                'password' => ''
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
}
