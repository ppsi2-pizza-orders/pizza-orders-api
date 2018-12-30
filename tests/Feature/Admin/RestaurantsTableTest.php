<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class RestaurantsTableTest extends TestCase
{	

	public function testIfRestaurantsTableIsReturnedForAdmin()
    {	
		$this->json(
            'POST',
            '/auth/login',
            [
                'email' => 'admin@example.com',
                'password' => 'test123'
            ]
        );
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
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
					'id',
					'name',
					'city',
					'address',
					'phone',
					'photo',
					'description',
					'created_at',
					'owner' => [
						'id',
						'name'
					],
				],
                'messages',
                'meta' => [
					'columns' => [
						'name',
						'label',
						'sortable',
						'searchable'
					],
					'paginator' => [
						'current_page',
						'last_page'
					]
				]
            ]);
    }
	
    public function testIfRestaurantsTableIsReturnedForNonAdmin()
    {	
		$this->json(
            'POST',
            '/auth/login',
            [
                'email' => 'client@example.com',
                'password' => 'test123'
            ]
        );
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
