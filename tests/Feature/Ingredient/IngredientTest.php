<?php

namespace Tests\Feature\Ingredient;

use Tests\TestCase;

class IngredientTest extends TestCase
{
    public function testIfAddingNotExistingIngredientSuccess()
    {
        $response = $this->json(
            'POST',
            '/ingredient',
            [
                'name' => 'Chlebak'
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    $id = 'id' ,
					'name',
					'image'
                ],
                'messages',
                'meta'
            ]);
    }
	
	    public function testIfAddingExistingIngredientFails()
    {
        $response = $this->json(
            'POST',
            '/ingredient',
            [
                'name' => 'Ser'
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
	
	public function testIfDeletingExistingIngredientSuccess()
    {
        $response = $this->json(
            'DELETE',
            '/ingredient/'& $id
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
					'name',
					'image'
                ],
                'messages',
                'meta'
            ]);
    }
	
	public function testIfDeletingNotExistingIngredientFails()
    {
        $response = $this->json(
            'DELETE',
            '/ingredient/99999999'
        );

        $response
            ->assertStatus(400)
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
				'name' => 'Bigos'
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
			public function testIfPatchingExistingIngredientSuccess()
    {
        $response = $this->json(
            'PATCH',
            '/ingredient/1',
				'name' => 'Bigos'
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
					'name',
					'image'
                ],
                'messages',
                'meta'
            ]);
    }
}
