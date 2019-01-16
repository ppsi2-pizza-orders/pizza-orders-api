<?php

namespace Tests\Feature\Restaurant;

use Tests\Feature\BaseTest;

class RestaurantTest extends BaseTest
{
					////////new restaur
	
	public function testIfNewRestaurantIsCreatedAuthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant',
            [
				'name' => 'Super Pizza',
				'city' => 'Sosnowiec',
				'address' => 'Długa 21',
				'phone' => '997'
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
	
	public function testIfNewRestaurantIsCreatedWithUnvalidDataAuthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant',
            [
				'name' => '',
				'city' => '',
				'address' => 'Deeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeea 21',
				'phone' => '477777777eeeeeeeeeeeeeeeeeeeeeeeeeeeeee'
			],
			[
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );
		
        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]
		);
		
    }
	
	public function testIfNewRestaurantIsNotCreatedUnauthorised()
    {
        $response = $this->json(
            'POST',
            '/restaurant',
            [
				'name' => 'Super Pizza',
				'city' => 'Sosnowiec',
				'address' => 'Długa 21',
				'phone' => '997'
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
					/// get restaur
	
	/**
     * @depends testIfNewRestaurantIsCreatedAuthorised
     */	
	public function testIfRestaurantDetailsIsReturnedAuthorised($id)
    {
        $response = $this->json(
            'GET',
            '/restaurant/' .$id,
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
					//// patch restaur
	/**
     * @depends testIfNewRestaurantIsCreatedAuthorised
     */	
	public function testIfRestaurantIsPatchingAuthorised($id)
    {
        $response = $this->json(
            'PATCH',
            '/restaurant/' .$id,
            [
				'name' => 'kocham straz miejska',
				'city' => 'Legnica',
				'address' => 'bezdomnego 69',
				'phone' => '997'
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
	
	/**
     * @depends testIfNewRestaurantIsCreatedAuthorised
     */
	public function testIfRestaurantIsNotPatchingUnauthorised($id)
    {
        $response = $this->json(
            'PATCH',
            '/restaurant/' .$id,
            [
				'name' => 'kocham straz miejska',
				'city' => 'Legnica',
				'address' => 'bezdomnego 69',
				'phone' => '997'
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
	
						//// delete restaur
	/**
     * @depends testIfNewRestaurantIsCreatedAuthorised
     */
	
	public function testIfRestaurantIsNotDeletedUnauthorised($id)
    {
        $response = $this->json(
            'DELETE',
            '/restaurant/' .$id
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
	
	/**
     * @depends testIfNewRestaurantIsCreatedAuthorised
     */
	
	public function testIfRestaurantIsDeletedAuthorised($id)
    {
        $response = $this->json(
            'DELETE',
            '/restaurant/' .$id,
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
	
	public function testIfRestaurantIsDeletedInvalidDataAuthorised($id)
    {
        $response = $this->json(
            'DELETE',
            '/restaurant/999',
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
}
