<?php

namespace Tests\Feature\Pizza;

use Tests\Feature\BaseTest;

class PizzaTest extends BaseTest
{
	////////////post
	
	public function testIfAddingPizzaWithValidDataSuccessAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/pizza',
            [  
				'price' => '30',
				'name' => 'Pizza dobra taka nie za słodka 2',
				'ingredients' => [
					'1',
					'2',
					'5'
				]
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
	
		public function testIfAddingPizzaWithValidDataSuccessUnuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/1/pizza',
            [  
				'price' => '30',
				'name' => 'Pizza dobra taka nie za słodka 3',
				'ingredients' => [
					'1',
					'2',
					'5'
				]
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
	
	////////////patch
	
	/**
     * @depends testIfAddingPizzaWithValidDataSuccessAuthorized
     */
	 
	public function testIfPatchingExistingPizzaSuccess($id)
    {	
		echo $id;
        $response = $this->json(
            'PATCH',
            '/pizza/' . $id,
			[
				'name' => 'Smalczyk',
				'price' => '9999'
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
	
	
	/**
     * @depends testIfAddingPizzaWithValidDataSuccessAuthorized
     */
	 
	public function testIfPatchingExistingPizzaFailsUnauthorized($id)
    {
        $response = $this->json(
            'PATCH',
            '/pizza/' . $id,
			[
				'name' => 'Smalczyk',
				'price' => '9999'
			]
        );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfPatchingNotExistingPizzaFails()
    {
        $response = $this->json(
            'PATCH',
            '/pizza/99999999',
			[
				'name' => 'Bigossssssssssss',
				'price' => '2'
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
     * @depends testIfAddingPizzaWithValidDataSuccessAuthorized
     */
	public function testIfDeletingExistingPizzaSuccess($id)
    {
        $response = $this->json(
            'DELETE',
            '/pizza/' . $id ,
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
	
	/**
     * @depends testIfAddingPizzaWithValidDataSuccessAuthorized
     */	
		public function testIfDeletingExistingPizzaFailsUnauthorized($id)
    {
        $response = $this->json(
            'DELETE',
            '/pizza/' . $id 
        );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfDeletingNotExistingPizzaFails()
    {
        $response = $this->json(
            'DELETE',
            '/pizza/99999999',
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
