<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Http\Requests\CreateIngredient;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\IngredientResource as IngredientResource;

class IngredientController extends Controller
{
    public function store(CreateIngredient $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->input('name');
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('image')->storeAs('public/ingredient_images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $ingredient->image = $fileNameToStore;
        $ingredient->save();
        return new IngredientResource($ingredient);
    }

    public function update(CreateIngredient $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->name = $request->input('name');
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('image')->storeAs('public/ingredient_images', $fileNameToStore);
        }
        if($request->hasFile('image'))
        {
            $ingredient->image = $fileNameToStore;
        }

        $ingredient->update();
        return new IngredientResource($ingredient);
    }
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        if($ingredient->delete()) {
            if($ingredient->image != 'noimage.jpg'){
                Storage::delete('public/ingredient_images/'.$ingredient->image);
            }
            return new IngredientResource($ingredient);
        }
    }
}
