<?php

namespace App\Http\Controllers\MainRestaurant;

use Storage;
use App\Interfaces\ImageUploaderInterface as ImageUploader;
use App\Interfaces\ApiResourceInterface as ApiResource;
use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\CreateIngredient;
use App\Models\Ingredient;

class IngredientController extends ApiResourceController
{
    protected $imageUploader;

    public function __construct(ApiResource $apiResource, ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($apiResource);
    }

    public function store(CreateIngredient $request)
    {
        $ingredient = new Ingredient([
            'name' => $request->input('name'),
            'image' => 'public/ingredients/noimage.jpg'
        ]);

        if ($request->hasFile('image')) {
            $ingredient->image = $this->imageUploader->store($request->image);
        }

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
            $ingredient->image = $this->imageUploader->store($request->image);
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
                Storage::delete($ingredient->image);
            }

            return $this->apiResponse
                ->pushMessage('Ingredient deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete ingredient');
    }
}
