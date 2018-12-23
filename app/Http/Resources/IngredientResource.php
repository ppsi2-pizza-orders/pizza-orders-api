<?php

namespace App\Http\Resources;

use Storage;

class IngredientResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => Storage::url($this->resource->image),
        ];
    }
}
