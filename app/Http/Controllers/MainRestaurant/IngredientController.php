<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Http\Controllers\ApiResourceController;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIngredient;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\IngredientResource as IngredientResource;

class IngredientController extends ApiResourceController
{
    public function store(CreateIngredient $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->input('name');

        if ($request->hasFile('image')) {
            $fileNameToStore = $this->uploadFile($request);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $ingredient->image = $fileNameToStore;
        $ingredient->save();

        return $this->apiResource
            ->resource($ingredient)
            ->pushMessage('Ingredient added')
            ->response();
    }

    public function update(CreateIngredient $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->name = $request->input('name');

        if ($request->hasFile('image')) {
            $fileNameToStore = $this->uploadFile($request);
            $ingredient->image = $fileNameToStore;
        }

        $ingredient->update();

        return $this->apiResource
            ->resource($ingredient)
            ->pushMessage('Ingredient updated')
            ->response();
    }

    public function destroy(int $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        if ($ingredient->delete()) {
            if ($ingredient->image != 'noimage.jpg') {
                Storage::delete('public/ingredient_images/'.$ingredient->image);
            }

            return $this->apiResponse
                ->pushMessage('Ingredient deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete ingredient');
    }

    public function uploadFile(Request $request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'_'.$extension;
        $path = $request->file('image')->storeAs('public/ingredient_images', $fileNameToStore);
        return $fileNameToStore;
    }

}
