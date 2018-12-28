<?php

namespace App\Http\Resources\Restaurant;

use Storage;
use App\Http\Resources\ApiResource;

class IngredientResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => url(Storage::url($this->resource->image)),
        ];
    }
}
