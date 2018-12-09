<?php

namespace App\Http\Resources;


class IngredientResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => $this->resource->image,
        ];
    }
}
