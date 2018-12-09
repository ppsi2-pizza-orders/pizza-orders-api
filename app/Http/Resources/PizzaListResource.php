<?php

namespace App\Http\Resources;

class PizzaListResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'name' => $this->resource->name,
        ];
    }
}
