<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class RestaurantsTableTest extends TestCase
{	

	public function testIfAddingFilledReviewsLoggedInSuccess()
    {	
		//login?
	
		$response = $this->json(
            'POST',
            '/restaurant/{id}/review',
            [
                'base_raing' => '5',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '5',
				'comment' => 'fajnu'
            ]
        );
        
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
					'id',
					'base_raing',
					'ingredients_rating',
					'delivery_time_rating',
					'comment',
					'created_at' => [
						'date',
						'timezone_type',
						'timezone'
					],
					'user_id' => [
						'id',
						'name'
					]
				],
                'messages',
                'meta'
            ]);
    }
	
	public function testIfAddingFilledReviewsNotLoggedInFails()
    {	
	
		$response = $this->json(
            'POST',
            '/restaurant/{id}/review',
            [
                'base_raing' => '5',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '5',
				'comment' => 'fajnu'
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
	
    public function testIfAddingNotFilledReviewsLoggedInFails()
        {
			
		//login?
		
		$response = $this->json(
            'POST',
            '/restaurant/{id}/review',
            [
                'base_raing' => '',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '',
				'comment' => 'fajnu'
            ]
        );
        
        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	///
	
		public function testIfDeletingReviewsLoggedInSuccess()
    {	
		//login?
	
		$response = $this->json(
            'DELETE',
            '/review/{id}',
            [
                'base_raing' => '5',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '5',
				'comment' => 'fajnu'
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
	
	public function testIfDeletingReviewsNotLoggedInFails()
    {	
	
		$response = $this->json(
            'DELETE',
            '/review/{id}',
            [
                'base_raing' => '5',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '5',
				'comment' => 'fajnu'
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
