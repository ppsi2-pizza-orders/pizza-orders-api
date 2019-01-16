<?php

namespace App\Http\Resources;

class UserPermissions extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'role' => $this->resource->pivot->role
        ];
    }
}
