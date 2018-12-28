<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\ApiResource;

class RestaurantPermissionsResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'token' => $this->resource->token,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'role' => $this->resource->pivot->role
        ];
    }
}
