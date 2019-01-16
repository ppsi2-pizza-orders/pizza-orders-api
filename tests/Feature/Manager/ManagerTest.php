<?php

namespace Tests\Feature\Manager;

use Tests\Feature\BaseTest;

class ManagerTest extends BaseTest
{
	////////////post
	
	
	public function testIfIngredientDetailsAreAddedAuthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/manage',
            [
                'ingredient_id' => '1',
				'available' => '120',
				'price' => '4'
            ],
			[
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );
		
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]
		);
		
    }
	
	public function testIfIngredientDetailsAreNotAddedInvalidDataAuthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/manage',
            [
                'ingredient_id' => '99999',
				'available' => '',
				'price' => ''
            ],
			[
                'Authorization' => 'Bearer ' . $this->getAdminToken()
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
