<?php

namespace App\Http\Resources\Restaurant;

use Storage;
use App\Http\Resources\ApiResource;

class RestaurantListResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'review_stars' => $this->resource->getReviewStars(),
            'photo' => url(Storage::url($this->resource->photo)),
        ];
    }
}
