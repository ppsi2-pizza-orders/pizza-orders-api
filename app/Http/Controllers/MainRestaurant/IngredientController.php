<?php

namespace App\Http\Controllers\MainRestaurant;

use Storage;
use App\Interfaces\ApiResourceInterface as ApiResource;
use App\Services\IngredientImageUploader as ImageUploader;
use App\Services\IngredientThumbnailUploader as ThumbnailUploader;
use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\CreateIngredient;
use App\Models\Ingredient;

class IngredientController extends ApiResourceController
{
    protected $imageUploader, $thumbnailUploader;

    public function __construct(ApiResource $apiResource, ImageUploader $imageUploader,  ThumbnailUploader $thumbnailUploader)
    {
        $this->imageUploader = $imageUploader;
        $this->thumbnailUploader = $thumbnailUploader;
        parent::__construct($apiResource);
    }

    public function index()
    {
        $data[] = Ingredient::get();
        return $this->apiResponse
            ->setData($data)
            ->response();
    }

    public function store(CreateIngredient $request)
    {
        $ingredient = new Ingredient([
            'name' => $request->input('name'),
            'image' => 'public/ingredients/noimage.jpg',
            'thumbnail' => 'public/ingredients/noimage.jpg',
            'index' => $request->input('index') ?? 0
        ]);

        if ($request->hasFile('image')) {
            $ingredient->image = $this->imageUploader->store($request->image);
        }

        if ($request->hasFile('thumbnail')) {
            $ingredient->thumbnail = $this->thumbnailUploader->store($request->image);
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

        if ($request->hasFile('thumbnail')) {
            $ingredient->thumbnail = $this->thumbnailUploader->store($request->image);
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
            if ($ingredient->image != 'public/ingredients/noimage.jpg') {
                Storage::delete($ingredient->image);
            }

            if ($ingredient->thumnbail != 'public/ingredients/noimage.jpg') {
                Storage::delete($ingredient->thumbnail);
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
