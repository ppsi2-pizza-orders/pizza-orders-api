<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Restaurant;


class ReviewResource extends AbstractApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'base_rating' => $this->resource->base_rating,
            'ingredients_rating' => $this->resource->ingredients_rating,
            'delivery_time_rating' => $this->resource->delivery_time_rating,
            'comment' => $this->resource->comment,
            'created_at' => $this->resource->created_at,
            'user_id' => User::find($this->resource->user_id, ['id', 'name'])
        ];
    }
}