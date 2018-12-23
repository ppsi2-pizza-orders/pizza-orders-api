<?php

namespace App\Http\Resources;

use Storage;

class PizzaFullResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'image' => Storage::url($this->resource->image),
        ];
    }
}
