<?php

namespace App\Http\Controllers\MainRestaurant;

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
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('image')->storeAs('public/pizza_images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $pizza->image = $fileNameToStore;
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
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('image')->storeAs('public/pizza_images', $fileNameToStore);
        }
        if($request->hasFile('image'))
        {
            $pizza->image = $fileNameToStore;
        }
        $pizza->update();
        return new PizzaResource($pizza);
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        if($pizza->delete()) {
            if($ingredient->image != 'noimage.jpg'){
                Storage::delete('public/pizza_images/'.$pizza->image);
            }
            return new PizzaResource($pizza);
        }
    }
}
