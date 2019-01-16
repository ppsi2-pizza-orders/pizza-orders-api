<?php

namespace Tests\Feature\Ingredient;

use Tests\Feature\BaseTest;

class IngredientTest extends BaseTest
{
	////////////post
	
	public function testIfAddingIngredientSuccess()
    {
        $response = $this->json(
            'POST',
            '/ingredient',
            [
                'name' => 'chlebake',
				'index' => '1'
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
		
	return $response->json('data')['id'];
    }
	
	////////////patch
	
	/**
     * @depends testIfAddingIngredientSuccess
     */
	public function testIfPatchingExistingIngredientSuccess($id)
    {
        $response = $this->json(
            'PATCH',
            '/ingredient/' . $id,
			[
				'name' => 'Bigos'
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
            ]);
    }
	
	public function testIfPatchingNotExistingIngredientFails()
    {
        $response = $this->json(
            'PATCH',
            '/ingredient/99999999',
			[
				'name' => 'Bigos'
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
            ]);
    }
	
	////////////delete
	
	/**
     * @depends testIfAddingIngredientSuccess
     */
	public function testIfDeletingExistingIngredientSuccess($id)
    {
        $response = $this->json(
            'DELETE',
            '/ingredient/' . $id ,
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
            ]);
    }
	
	public function testIfDeletingNotExistingIngredientFails()
    {
        $response = $this->json(
            'DELETE',
            '/ingredient/99999999',
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
            ]);
    }
	
	
}
