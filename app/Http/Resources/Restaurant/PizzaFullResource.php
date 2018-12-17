<?php

namespace App\Http\Resources\Restaurant;

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
            'image' => $this->resource->image,
        ];
    }
}
