<?php

namespace App\Http\Resources\Restaurant;

use Storage;
use App\Http\Resources\ApiResource;

class PizzaFullResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'ingredients' => (new IngredientResource)->collect($this->resource->ingredients),
        ];
    }
}
