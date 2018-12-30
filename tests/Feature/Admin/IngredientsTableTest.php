<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class IngredientsTableTest extends TestCase
{	

	public function testIfUsersTableIsReturnedForAdmin()
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
            '/admin/ingredients',
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
					'image'
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
	
    public function testIfUsersTableIsNotReturnedForNonAdmin()
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
            '/admin/ingredients',
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
