<?php

namespace App\Http\Resources;

class UserResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'admin' => $this->resource->is_admin,
        ];
    }
}
