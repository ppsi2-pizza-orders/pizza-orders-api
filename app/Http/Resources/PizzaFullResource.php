<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Config;

class PizzaFullResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'image' => Config::get('constants.links.pizza_images').$this->resource->image,
        ];
    }
}
