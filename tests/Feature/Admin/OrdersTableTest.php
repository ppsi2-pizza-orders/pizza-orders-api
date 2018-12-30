<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class OrdersTableTest extends TestCase
{	

	public function testIfOrdersTableIsReturnedForAdmin()
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
            '/admin/orders',
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
					'token',
					'email',
					'restaurant',
					'city',
					'status',
					'delivery_address',
					'phone_number',
					'created_at',
					'pizzas' => [
						'price',
						'description',
						'type'
					]
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
	
    public function testIfOrdersTableIsReturnedForNonAdmin()
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
}
