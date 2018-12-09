<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\AbstractApiResource;
use App\Http\Resources\PizzaListResource as ListPizza;

class RestaurantListResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'pizzas' => (new ListPizza)->collect($this->resource->pizzas),
        ];
    }
}
