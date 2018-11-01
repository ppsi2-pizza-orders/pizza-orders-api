<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurant;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource as FullRestaurant;
use App\Http\Resources\RestaurantListResource as ListRestaurant;

class RestaurantController extends Controller
{
    public function search(Request $request)
    {
        $restaurantName = $request->input('searchName');
        $restaurantCity = $request->input('searchCity');

        $restaurant = Restaurant::where
        (
            [
                ['name', 'like', "%{$restaurantName}%"],
                ['city', 'like', "%{$restaurantCity}%"],
            ]
        )
            ->get();
        return ListRestaurant::collection($restaurant);
    }

    public function store(CreateRestaurant $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->city = $request->input('city');
        $restaurant->save();
        return new FullRestaurant($restaurant);
    }

    public function update(CreateRestaurant $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->input('name');
        $restaurant->city = $request->input('city');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        $restaurant->photo = $request->input('photo');
        $restaurant->description = $request->input('description');
        $restaurant->update();
        return new FullRestaurant($restaurant);
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return new FullRestaurant($restaurant);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if($restaurant->delete()) {
            return new FullRestaurant($restaurant);
        }
    }
}
