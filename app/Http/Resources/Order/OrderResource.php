<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\ApiResource;

use App\Http\Resources\Restaurant\PizzaFullResource;

class OrderResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'token' => $this->resource->token,
            'status' => $this->resource->status,
            'price' => number_format($this->resource->price, 2, ',', ''),
            'pizzas' => (new PizzaFullResource)->collect($this->resource->pizzas),
            'delivery_address' => $this->resource->delivery_address,
            'phone_number' => $this->resource->phone_number,
        ];
    }
}
