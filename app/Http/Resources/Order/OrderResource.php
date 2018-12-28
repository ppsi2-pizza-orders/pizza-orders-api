<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\ApiResource;

class OrderResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'token' => $this->resource->token,
            'status' => $this->resource->status,
            'price' => number_format($this->resource->pizzas()->sum('price'), 2, ',', ''),
            'delivery_address' => $this->resource->delivery_address,
            'phone_number' => $this->resource->phone_number,
            'pizzas' => (new OrderPizzaResource)->collect($this->resource->pizzas)
        ];
    }
}
