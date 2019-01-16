<?php

namespace Tests\Feature;

use Tests\TestCase;

class BaseTest extends TestCase
{
    protected function getAuthToken(array $credentials): string
    {
        $response = $this->json(
            'POST',
            '/auth/login',
            $credentials
        );

        return $response->json('data')['token'];
    }
	
	protected function getClientToken(): string
    {
        return $this->getAuthToken([
            'email' => 'client@example.com',
            'password' => 'test123'
        ]);
    }
	
    protected function getAdminToken(): string
    {
        return $this->getAuthToken([
            'email' => 'admin@example.com',
            'password' => 'test123'
        ]);
    }
}