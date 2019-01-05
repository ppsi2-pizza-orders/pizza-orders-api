<?php

namespace App\Http\Resources\Restaurant;

use App\Models\User;
use App\Http\Resources\ApiResource;

class ReviewResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'base_rating' => $this->resource->base_rating,
            'ingredients_rating' => $this->resource->ingredients_rating,
            'delivery_time_rating' => $this->resource->delivery_time_rating,
            'average_rating' => floor($this->resource->average_rating * 2) / 2,
            'comment' => $this->resource->comment,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
            'user' => User::find($this->resource->user_id, ['id', 'name'])
        ];
    }
}
