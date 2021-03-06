<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\ManageIngredientsRequest;
use App\Models\Restaurant;
use App\Models\Ingredient;

class RestaurantManagerController extends ApiResourceController
{
    public function manage($id, ManageIngredientsRequest $request)
    {
        $restaurant = Restaurant::findOrFail($id);
        $ingredientId= $request->input('ingredient_id');
        $ingredientPrice = $request->input('price');
        $ingredientAvailability = $request->input('available');

        $ingredient = Ingredient::findOrFail($ingredientId);

        $ingredientRestaurant = $ingredient->restaurants()
            ->wherePivot('ingredient_id', $ingredientId)
            ->first();

        if ($ingredientRestaurant) {
            $ingredient->restaurants()->updateExistingPivot($restaurant, ['price' => $ingredientPrice, 'available' => $ingredientAvailability]);
        }
        else {
            $ingredient->restaurants()->attach($restaurant, ['price' => $ingredientPrice, 'available' => $ingredientAvailability]);
        }

        return $this->apiResponse
            ->pushMessage('Ingredient saved')
            ->response();
    }

    public function ingredients($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return $this->apiResource
            ->resource($restaurant->ingredients)
            ->response();
    }
}
