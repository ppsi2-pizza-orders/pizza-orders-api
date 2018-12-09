<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\CreatePizza;
use App\Models\Restaurant;
use App\Models\Pizza;

class PizzaController extends ApiResourceController
{
    public function store(CreatePizza $request, $id)
    {
        $pizza = new Pizza();
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');

        if ($request->hasFile('image')) {
            $fileNameToStore = $this->uploadFile($request);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $pizza->image = $fileNameToStore;
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
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');

        if ($request->hasFile('image')) {
            $fileNameToStore = $this->uploadFile($request);
            $pizza->image = $fileNameToStore;
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
            if ($pizza->image != 'noimage.jpg') {
                Storage::delete('public/pizza_images/'.$pizza->image);
            }

            return $this->apiResponse
                ->pushMessage('Pizza deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete pizza');
    }

    public function uploadFile(Request $request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'_'.$extension;
        $path = $request->file('image')->storeAs('public/pizza_images', $fileNameToStore);
        return $fileNameToStore;
    }
}
