<?php

namespace Tests\Feature\Admin;

use Tests\Feature\BaseTest;

class UsersTableTest extends BaseTest
{	

	public function testIfUsersTableIsReturnedForAdmin()
    {	
        $response = $this->json(
            'GET',
            '/admin/users',
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
	
    public function testIfUsersTableIsNotReturnedForNonAdmin()
    {	
        $response = $this->json(
            'GET',
            '/admin/users',
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
	
	public function testIfUsersTableIsNotReturnedForNotLoggedIn()
    {	
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
