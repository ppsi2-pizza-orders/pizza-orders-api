<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiResourceController;
use App\Models\Restaurant;

class RestaurantListController extends ApiResourceController
{
    public function search(Request $request)
    {
        $restaurantName = $request->input('searchName');
        $restaurantCity = $request->input('searchCity');

        $restaurants = Restaurant::where([
            ['name', 'like', "%{$restaurantName}%"],
            ['city', 'like', "%{$restaurantCity}%"],
        ])->get();

        return $this->apiResource
            ->resource($restaurants)
            ->response();
    }
}
