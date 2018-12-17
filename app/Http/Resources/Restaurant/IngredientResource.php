<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\ApiResource;

class IngredientResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => $this->resource->image,
        ];
    }
}
