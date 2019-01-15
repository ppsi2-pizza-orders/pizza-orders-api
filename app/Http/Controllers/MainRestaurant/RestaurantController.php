<?php

namespace App\Http\Controllers\MainRestaurant;

use Storage;
use JWTAuth;
use App\Interfaces\ApiResourceInterface as ApiResource;
use App\Services\RestaurantImageUploader as ImageUploader;
use App\Http\Requests\CreateRestaurant;
use App\Models\Restaurant;
use App\Http\Controllers\ApiResourceController;

class RestaurantController extends ApiResourceController
{
    protected $imageUploader;

    public function __construct(ApiResource $apiResource, ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($apiResource);
    }

    public function index()
    {
        $restaurants = Restaurant::where('confirmed', 'like', 1)
            ->where('confirmed', true)
            ->pluck('name')
            ->unique()
            ->values();

        $cities = Restaurant::where('confirmed', 'like', 1)
            ->where('confirmed', true)
            ->pluck('city')
            ->unique()
            ->values();

        $data = [
            'names' => $restaurants,
            'cities'=> $cities,
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

        $restaurant = new Restaurant([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'photo' => 'public/restaurants/noimage.jpg',
            'owner_id' => JWTAuth::user()->id,
        ]);

        if ($request->hasFile('photo')) {
            $restaurant->photo = $this->imageUploader->store($request->photo);
        }

        $restaurant->save();

        return $this->apiResource
            ->resource($restaurant)
            ->pushMessage('Restaurant created')
            ->response();
    }

    public function update(CreateRestaurant $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $restaurant->fill([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('photo')) {
            $restaurant->photo = $this->imageUploader->store($request->photo);
        }

        $restaurant->update();

        if (!$restaurant->isReadyForPublication()) {
            $restaurant->update(['visible' => false, 'confirmed' => false]);
        }

        return $this->apiResource
            ->resource($restaurant)
            ->pushMessage('Restaurant updated')
            ->response();
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->delete()) {
            if ($restaurant->image != 'public/restaurants/noimage.jpg') {
                Storage::delete($restaurant->photo);
            }

            return $this->apiResponse
                ->pushMessage('Restaurant deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete restaurant');
    }
}
