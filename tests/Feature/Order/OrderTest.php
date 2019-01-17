<?php

namespace Tests\Feature\Order;

use Tests\Feature\BaseTest;

class OrderTest extends BaseTest
{
    public function testIfOrdersIsPlacedWithValidDataAuthorized()
    {
        $response = $this->json(
            'POST',
            '/order',
            [
                'restaurant_id' => '1',
				'delivery_address' => 'Długa 12 Legnica',
				'phone_number' => '123341111',
				'pizzas' => [
					'ingredients' => [
						'1',
						'2',
						'5'
					],
					'id' => '1',
				]
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
		
		return $response->json('data')['token'];
    }
    
	    public function testIfOrdersIsPlacedWithValidDataUnauthorized()
    {
        $response = $this->json(
            'POST',
            '/order',
            [
                'restaurant_id' => '1',
				'delivery_address' => 'Długa 12 Legnica',
				'phone_number' => '123341111',
				'pizzas' => [
					'ingredients' => [
						'1',
						'2',
						'5'
					],
					'id' => '1'
				]
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
	
	    public function testIfOrdersIsNotPlacedWithInvalidDataAuthorized()
    {
		
        $response = $this->json(
            'POST',
            '/order',
            [
                'restaurant_id' => '99999999999999999999999999999999999999',
				'delivery_address' => 'Długa 12 Legnica',
				'phone_number' => '123341111',
				'pizzas' => [
					'ingredients' => [
						'199913123',
						'2',
						'5'
					],
					'id' => '9'
				]
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
            ]
		);
    }
	
	//////////////// getters

	/**
     * @depends testIfOrdersIsPlacedWithValidDataAuthorized
     */
    public function testIfUserOrdersAreReturnedAuthorized($token)
    {
        $response = $this->json(
            'GET',
            '/order/' . $token,
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
    
	/**
     * @depends testIfOrdersIsPlacedWithValidDataAuthorized
     */
	 
	public function testIfUserOrdersAreNotReturnedUnauthorized($token)
    {
        $response = $this->json(
            'GET',
            '/order/' . $token,
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
	
	public function testIfRestaurantOrdersAreReturnedAuthorized()
    {
		//login?
        $response = $this->json(
            'GET',
            '/restaurant/1/orders',
			[
                'Authorization' => 'Bearer ' . $this->getAuthToken(['email' => 'chief@example.com', 'password' => 'test123'])
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
	
	public function testIfRestaurantOrdersAreNotReturnedUnauthorized()
    {
        $response = $this->json(
            'GET',
            '/restaurant/1/orders'
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
	
	///////////// changing status
	
	
	/**
     * @depends testIfOrdersIsPlacedWithValidDataAuthorized
     */
	 public function testIfOrdersIsChangedAuthorized($token)
    {
		//login?
        $response = $this->json(
            'POST',
            '/order/' . $token . '/status/next',
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
	
	/**
     * @depends testIfOrdersIsPlacedWithValidDataAuthorized
     */
	public function testIfOrdersIsNotChangedUnauthorized($token)
    {
        $response = $this->json(
            'POST',
            '/order/' . $token .'/status/next'
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
