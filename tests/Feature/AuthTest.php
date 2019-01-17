<?php

namespace Tests\Feature;

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
}