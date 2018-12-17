<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Config;

class IngredientResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => Config::get('constants.links.ingredient_images').$this->resource->image,
        ];
    }
}
