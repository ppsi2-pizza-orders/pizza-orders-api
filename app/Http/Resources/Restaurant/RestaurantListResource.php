<?php

namespace App\Http\Resources\Restaurant;


use App\Http\Resources\ApiResource;
use App\Http\Resources\Restaurant\PizzaListResource as ListPizza;


class RestaurantListResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'pizzas' => (new ListPizza)->collect($this->resource->pizzas),
            'review_stars' => $this->resource->getReviewStars(),
        ];
    }
}
