<?php

namespace Tests\Feature\Restaurant;

use Tests\Feature\BaseTest;

class RestaurantsTest extends BaseTest
{
	////////////get
	
	public function testIfRestaurantListIsReturnedAuthorized()
    {
        $response = $this->json(
            'GET',
            '/restaurants',
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
	
	public function testIfRestaurantListIsNotReturnedUnuthorized()
    {
        $response = $this->json(
            'GET',
            '/restaurants',
			[
                'Authorization' => 'Bearer ' . $this->getAdminToken()
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
	
	//post 
	
	public function testIfRestaurantListIsReturnedWithCriteriaAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurants',
			[
				'searchName' => 'Da Grasso',
				'searchCity' => 'Legnica'
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

	public function testIfRestaurantListIsNotReturnedWithCriteriaUnuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurants',
			[
				'searchName' => 'Da Grasso',
				'searchCity' => 'Legnica'
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