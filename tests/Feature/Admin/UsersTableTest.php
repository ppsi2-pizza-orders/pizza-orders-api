<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class UsersTableTest extends TestCase
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
            '/admin/users',
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
					'email',
					'provider'
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
	
    public function testIfUsersTableIsReturnedForNonAdmin()
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
            '/admin/users',
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
