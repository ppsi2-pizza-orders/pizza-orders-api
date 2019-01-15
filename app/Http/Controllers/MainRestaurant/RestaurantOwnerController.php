<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Http\Requests\AddUserToRestaurant;
use App\Http\Controllers\ApiResourceController;
use App\Models\Restaurant;
use App\Models\User;
use App\Interfaces\ApiResourceInterface as ApiResource;

class RestaurantOwnerController extends ApiResourceController
{
    public function __construct(ApiResource $apiResource)
    {
        parent::__construct($apiResource);
    }

    public function grant($id, AddUserToRestaurant $request)
    {
        $restaurant = Restaurant::findOrFail($id);
        $userEmail = $request->input('email');
        $userRole = $request->input('role');

        $user = User::where('email', 'like', $userEmail)->firstOrFail();

        $userRestaurant = $user->restaurants()
            ->wherePivot('restaurant_id', $id)
            ->wherePivot('role', $userRole)
            ->first();

        if ($userRestaurant) {
            throw $this->apiException
                ->setStatusCode(400)
                ->pushMessage('User role already added');
        }

        $user->restaurants()->attach($restaurant, ['role' => $userRole]);

        return $this->apiResponse
            ->pushMessage('User added to restaurant')
            ->response();
    }

    public function revoke($id, $user_id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $user = User::findOrFail($user_id);
        $user->restaurants()->detach($restaurant);

        return $this->apiResponse
            ->pushMessage('User removed from restaurant')
            ->response();
    }

    public function request($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if (!$restaurant->isReadyForPublication()) {
            throw $this->apiException
                ->setStatusCode(400)
                ->pushMessage('You need to fill all necessary information before sending a publish request');
        }

        $restaurant->update(['visible' => true]);

        return $this->apiResponse
            ->pushMessage('Request successfully sent to an admin')
            ->response();
    }

    public function cancel($id)
    {
        Restaurant::findOrFail($id)->update(['visible' => false, 'confirmed' => false]);

        return $this->apiResponse
            ->pushMessage('Restaurant status changed to private')
            ->response();
    }
}
