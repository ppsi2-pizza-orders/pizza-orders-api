<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\ApiResource;

class RestaurantIngredientsResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->pivot->price,
            'available' => $this->resource->pivot->available
        ];
    }
}
