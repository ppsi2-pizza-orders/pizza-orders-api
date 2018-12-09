<?php

namespace App\Http\Resources;

class PizzaFullResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'image' => $this->resource->image,
        ];
    }
}
