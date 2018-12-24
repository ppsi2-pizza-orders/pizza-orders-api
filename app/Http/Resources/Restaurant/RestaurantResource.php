<?php

namespace App\Http\Resources\Restaurant;

use Storage;
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
            'photo' => url(Storage::url($this->resource->photo)),
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at,
            'owner_id' => User::find($this->resource->owner_id, ['id', 'name']),
            'pizzas' => (new FullPizza)->collect($this->resource->pizzas),
            'reviews' => (new FullReview)->collect($this->resource->reviews),
        ];
    }
}
