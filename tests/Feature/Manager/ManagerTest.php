<?php

namespace Tests\Feature\Manager;

use Tests\Feature\BaseTest;

class ManagerTest extends BaseTest
{
	
	public function testIfIngredientDetailsAreNotAddedInvalidDataAuthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/manage',
            [
                'ingredient_id' => '99999',
				'available' => 0,
				'price' => 5
            ],
			[
                'Authorization' => 'Bearer ' . $this->getAuthToken(['email' => 'manager@example.com', 'password' => 'test123'])
            ]
        );
		
        $response
            ->assertStatus(404)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]
		);
		
    }
	
	public function testIfIngredientDetailsAreNotAddedUnauthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/manage',
            [
                'ingredient_id' => '1',
				'available' => '120',
				'price' => '4'
            ]
        );
		
        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]
		);
		
    }
}
