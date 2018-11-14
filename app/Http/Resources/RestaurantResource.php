<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Http\Resources\PizzaFullResource as FullPizza;
use App\Http\Resources\ReviewResource as FullReview;

class RestaurantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->phone,
            'photo' => $this->photo,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'owner_id' => User::find($this->owner_id, ['id', 'name']),
            'pizzas' => FullPizza::collection($this->pizzas),
            'reviews' => FullReview::collection($this->reviews),
        ];
    }
}
