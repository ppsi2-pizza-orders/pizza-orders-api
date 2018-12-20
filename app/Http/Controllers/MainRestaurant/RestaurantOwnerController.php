<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiResourceController;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantOwnerController extends ApiResourceController
{
    public function grant($id, Request $request)
    {
        $restaurant = Restaurant::findOrFail($id);
        $userEmail = $request->input('email');
        $userRole = $request->input('role');

        $user = User::where('email', 'like', $userEmail)->firstOrFail();

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
}
