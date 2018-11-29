<?php

namespace App\Http\Controllers\MainRestaurant;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurant;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource as FullRestaurant;
use App\Http\Resources\RestaurantListResource as ListRestaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::pluck('name');
        $cities = Restaurant::pluck('city')->unique()->values();

        return response()->json([
            'names' => $restaurants,
            'cities'=> $cities
        ]);
    }

    public function search(Request $request)
    {
        $restaurantName = $request->input('searchName');
        $restaurantCity = $request->input('searchCity');

        $restaurant = Restaurant::where([
            ['name', 'like', "%{$restaurantName}%"],
            ['city', 'like', "%{$restaurantCity}%"],
        ])->get();

        return ListRestaurant::collection($restaurant);
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return new FullRestaurant($restaurant);
    }

    public function store(CreateRestaurant $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->city = $request->input('city');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');

        if ($request->hasFile('photo')) {
            $fileNameToStore = $this->uploadFile($request);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $restaurant->photo = $fileNameToStore;
        $restaurant->owner_id = JWTAuth::parseToken()->authenticate()->id();
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

        if ($request->hasFile('photo')) {
            $fileNameToStore = $this->uploadFile($request);
            $restaurant->photo = $fileNameToStore;
        }

        $restaurant->description = $request->input('description');
        $restaurant->update();

        return new FullRestaurant($restaurant);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if ($restaurant->delete()) {
            if ($restaurant->image != 'noimage.jpg') {
                Storage::delete('public/restaurant_photos/'.$restaurant->photo);
            }
            return new FullRestaurant($restaurant);
        }
    }

    public function uploadFile(Request $request)
    {
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'_'.$extension;
        $path = $request->file('photo')->storeAs('public/restaurant_photos', $fileNameToStore);
        return $fileNameToStore;
    }
}
