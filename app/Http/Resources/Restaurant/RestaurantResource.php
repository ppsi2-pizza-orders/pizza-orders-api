<?php

namespace App\Http\Resources\Restaurant;

use App\Models\User;
use App\Http\Resources\ApiResource;
use App\Http\Resources\Restaurant\PizzaFullResource as FullPizza;

class RestaurantResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'address' => $this->resource->address,
            'phone' => $this->resource->phone,
            'photo' => $this->resource->photo,
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at,
            'owner_id' => User::find($this->resource->owner_id, ['id', 'name']),
            'pizzas' => (new FullPizza)->collect($this->resource->pizzas),
            'review_stars' => $this->resource->getReviewStars(),
        ];
    }
}
