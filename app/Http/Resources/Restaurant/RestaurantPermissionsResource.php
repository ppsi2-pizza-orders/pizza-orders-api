<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\AbstractApiResource;

class RestaurantPermissionsResource extends AbstractApiResource
{

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'role' => $this->resource->pivot->role
        ];
    }
}
