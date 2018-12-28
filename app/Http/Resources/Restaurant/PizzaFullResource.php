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
            'price' => number_format($this->resource->price, 2, ',', ''),
            'ingredients' => (new IngredientResource)->collect($this->resource->ingredients),
            'image' => url(Storage::url($this->resource->image)),
        ];
    }
}
