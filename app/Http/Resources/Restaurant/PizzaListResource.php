<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\ApiResource;

class PizzaListResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'name' => $this->resource->name,
        ];
    }
}
