<?php

namespace Tests\Feature\Review;

use Tests\Feature\BaseTest;

class ReviewTest extends BaseTest
{	
	private $restaurant_id = "1";
	
	public function testIfAddingFilledReviewsLoggedInSuccess()
    {	
			$response = $this->json(
            'POST',
            '/restaurant/' .$this->restaurant_id. '/review',
            [
                'base_rating' => '5',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '5',
				'comment' => 'fajnu'
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
		
		return $response->json('data')['id'];
    }
	
	public function testIfAddingFilledReviewsNotLoggedInFails()
    {	
	
		$response = $this->json(
            'POST',
            '/restaurant/' .$this->restaurant_id. '/review',
            [
                'base_rating' => '5',
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
		
		$response = $this->json(
            'POST',
            '/restaurant/' . $this->restaurant_id . '/review',
            [
                'base_rating' => '',
				'ingredients_rating' => '5',
				'delivery_time_rating' => '',
				'comment' => 'fajnu'
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
            ]);
    }
	
	/**
     * @depends testIfAddingFilledReviewsLoggedInSuccess
     */
		public function testIfDeletingReviewsLoggedInSuccess($review_id)
    {	
	
		$response = $this->json(
            'DELETE',
            '/review/'. $review_id,
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
	
	/**
     * @depends testIfAddingFilledReviewsLoggedInSuccess
     */
	 
	public function testIfDeletingReviewsNotLoggedInFails($review_id)
    {	
	
		$response = $this->json(
            'DELETE',
            '/review/'. $review_id
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

