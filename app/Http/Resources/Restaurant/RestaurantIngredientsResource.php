<?php

namespace App\Http\Resources\Restaurant;

use Storage;
use App\Http\Resources\ApiResource;

class RestaurantIngredientsResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->pivot->price,
            'available' => $this->resource->pivot->available,
            'image' => url(Storage::url($this->resource->image)),
            'thumbnail' => url(Storage::url($this->resource->thumbnail)),
            'index' => (int)$this->resource->index,
        ];
    }
}
