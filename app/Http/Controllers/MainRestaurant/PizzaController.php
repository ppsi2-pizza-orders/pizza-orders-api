<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePizza;
use App\Models\Restaurant;
use App\Models\Pizza;
use App\Http\Resources\PizzaFullResource as PizzaResource;

class PizzaController extends Controller
{
    public function store(CreatePizza $request, $id)
    {
        $pizza = new Pizza();
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');
        $pizza->save();
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->pizzas()->attach($pizza);
        return new PizzaResource($pizza);
    }

    public function update(CreatePizza $request, $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');
        $pizza->update();
        return new PizzaResource($pizza);
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        if($pizza->delete()) {
            return new PizzaResource($pizza);
        }
    }
}
