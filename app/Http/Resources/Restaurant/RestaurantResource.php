<?php

namespace App\Http\Resources\Restaurant;

use Storage;
use App\Models\User;
use App\Http\Resources\ApiResource;
use App\Http\Resources\Restaurant\PizzaFullResource as FullPizza;
use App\Http\Resources\UserPermissions;
use App\Http\Resources\Restaurant\RestaurantIngredientsResource as IngredientsResource;

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
            'photo' => url(Storage::url($this->resource->photo)),
            'description' => $this->resource->description,
            'visible' => (bool)$this->resource->visible,
            'confirmed' => (bool)$this->resource->confirmed,
            'created_at' => $this->resource->created_at,
            'owner_id' => User::find($this->resource->owner_id, ['id', 'name']),
            'pizzas' => (new FullPizza)->collect($this->resource->pizzas),
            'review_stars' => $this->resource->getReviewStars(),
            'reviews' => (new ReviewResource)->collect($this->resource->reviews),
            'ingredients' => (new IngredientsResource)->collect($this->resource->ingredients),
            'users' => (new UserPermissions)->collect($this->resource->users),
        ];
    }
}
