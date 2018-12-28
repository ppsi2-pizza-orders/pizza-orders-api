<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\ApiResource;

class OrderPizzaResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'price' => number_format($this->resource->price, 2, ',', ''),
            'description' => $this->resource->description,
            'type' => $this->resource->type,
        ];
    }
}
