<?php

namespace Tests\Feature\Admin;

use Tests\Feature\BaseTest;

class RestaurantsTableTest extends BaseTest
{	

	public function testIfRestaurantsTableIsReturnedForAdmin()
    {	
        $response = $this->json(
            'GET',
            '/admin/restaurants',
			[
				'orderBy' => '',
				'orderByDesc' => '',
				'search' => ''
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
	
    public function testIfRestaurantsTableIsNotReturnedForNonAdmin()
    {	

        $response = $this->json(
            'GET',
            '/admin/restaurants',
			[
				'orderBy' => '',
				'orderByDesc' => '',
				'search' => ''
			],
            [
                'Authorization' => 'Bearer ' . $this->getClientToken()
            ]
        );
			
        $response->assertStatus(403);
    }
	
	public function testIfRestaurantsTableIsReturnedForNotLoggedIn()
    {	

        $response = $this->json(
            'GET',
            '/admin/restaurants',
			[
				'orderBy' => '',
				'orderByDesc' => '',
				'search' => ''
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
}
