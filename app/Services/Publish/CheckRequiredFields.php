<?php

namespace App\Services\Publish;

use App\Models\Restaurant;

class CheckRequiredFields
{
    public function check($id)
    {
        $ready = false;
        $restaurant = Restaurant::findOrFail($id);
        $restaurantName = $restaurant->name;
        $restaurantCity = $restaurant->city;
        $restaurantAddress = $restaurant->address;
        $restaurantPhone = $restaurant->phone;
        $restaurantDescription = $restaurant->description;
        if ($restaurantName and $restaurantCity and $restaurantAddress and $restaurantPhone and $restaurantDescription) {
            $ready = true;
        }
        return $ready;
    }
}