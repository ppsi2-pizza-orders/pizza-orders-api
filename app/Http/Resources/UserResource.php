<?php

namespace App\Http\Resources;

class UserResource extends ApiResource
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
