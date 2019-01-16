<?php

namespace Tests\Feature\Admin;

use Tests\Feature\BaseTest;

class OrdersTableTest extends BaseTest
{	

	public function testIfOrdersTableIsReturnedForAdmin()
    {	
        $response = $this->json(
            'GET',
            '/admin/orders',
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
            ]
		);
    }
	
	public function testIfOrdersTableIsNotReturnedForNotLoggedIn()
    {	

        $response = $this->json(
            'GET',
            '/admin/orders',
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
	
    public function testIfOrdersTableIsNotReturnedForNonAdmin()
    {	

        $response = $this->json(
            'GET',
            '/admin/orders',
			[
				'orderBy' => '',
				'orderByDesc' => '',
				'search' => ''
			],
            [
                'Authorization' => 'Bearer ' . $this->getClientToken()
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
