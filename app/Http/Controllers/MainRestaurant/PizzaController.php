<?php

namespace App\Http\Controllers\MainRestaurant;

use Storage;

use App\Interfaces\ApiResourceInterface as ApiResource;
use App\Services\PizzaImageUploader as ImageUploader;
use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\CreatePizza;
use App\Http\Requests\AttachIngredientRequest;
use App\Models\Restaurant;
use App\Models\Pizza;
use App\Models\Ingredient;

class PizzaController extends ApiResourceController
{
    protected $imageUploader;

    public function __construct(ApiResource $apiResource, ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($apiResource);
    }

    public function store(CreatePizza $request, $id)
    {
        $pizza = new Pizza([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => 'public/restaurants/noimage.jpg',
        ]);

        if ($request->hasFile('image')) {
            $pizza->image = $this->imageUploader->store($request->image);
        }

        $pizza->save();

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->pizzas()->attach($pizza);

        return $this->apiResource
            ->resource($pizza)
            ->pushMessage('Pizza added')
            ->response();
    }

    public function update(CreatePizza $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        $pizza->fill([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        if ($request->hasFile('image')) {
            $pizza->image = $this->imageUploader->store($request->image);
        }

        $pizza->update();

        return $this->apiResource
            ->resource($pizza)
            ->pushMessage('Pizza updated')
            ->response();
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);

        if ($pizza->delete()) {
            if ($pizza->image != 'public/pizzas/noimage.jpg') {
                Storage::delete($pizza->image);
            }

            return $this->apiResponse
                ->pushMessage('Pizza deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete pizza');
    }

    public function attach($pizza_id, AttachIngredientRequest $request)
    {
        $pizza = Pizza::findOrFail($pizza_id);
        $ingredientFind = $request->input('ingredient_id');
        $ingredient = Ingredient::findOrFail($ingredientFind);

            $ingredient->pizzas()->attach($pizza);

        return $this->apiResponse
            ->pushMessage('Ingredients saved')
            ->response();
    }

    public function detach($pizza_id, AttachIngredientRequest $request)
    {
        $pizza = Pizza::findOrFail($pizza_id);
        $ingredientFind = $request->input('ingredient_id');
        $ingredient = Ingredient::findOrFail($ingredientFind);

        $ingredient->pizzas()->detach($pizza);

        return $this->apiResponse
            ->pushMessage('Ingredients saved')
            ->response();
    }
}
