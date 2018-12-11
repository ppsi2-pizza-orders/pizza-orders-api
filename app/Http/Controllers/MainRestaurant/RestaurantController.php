<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurant;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource as FullRestaurant;
use App\Http\Resources\RestaurantListResource as ListRestaurant;

use App\Http\Controllers\ApiResourceController;

class RestaurantController extends ApiResourceController
{
    public function index()
    {
        $restaurants = Restaurant::pluck('name');
        $cities = Restaurant::pluck('city')->unique()->values();

        $data = [
            'names' => $restaurants,
            'cities'=> $cities
        ];

        return $this->apiResponse
            ->setData($data)
            ->response();
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return $this->apiResource
            ->resource($restaurant)
            ->response();
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
        $restaurant->owner_id = JWTAuth::user()->id;
        $restaurant->save();

        return $this->apiResource
            ->resource($restaurant)
            ->pushMessage('Restaurant created')
            ->response();
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

        return $this->apiResource
            ->resource($restaurant)
            ->pushMessage('Restaurant updated')
            ->response();
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->delete()) {
            if ($restaurant->image != 'noimage.jpg') {
              Storage::delete('public/restaurant_photos/'.$restaurant->photo);
            }

            return $this->apiResponse
                ->pushMessage('Restaurant deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete restaurant');
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
