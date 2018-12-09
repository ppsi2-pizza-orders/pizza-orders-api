<?php

namespace App\Http\Resources\Restaurant;

use App\Models\User;
use App\Http\Resources\AbstractApiResource;
use App\Http\Resources\PizzaFullResource as FullPizza;
use App\Http\Resources\ReviewResource as FullReview;

class RestaurantResource extends AbstractApiResource
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
            'pizzas' => FullPizza::collection($this->resource->pizzas),
            'reviews' => FullReview::collection($this->resource->reviews),
        ];
    }
}
