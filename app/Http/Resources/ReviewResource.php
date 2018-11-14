<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Restaurant;


class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'base_rating' => $this->base_rating,
            'ingredients_rating' => $this->ingredients_rating,
            'delivery_time_rating' => $this->delivery_time_rating,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'user_id' => User::find($this->user_id, ['id', 'name'])
        ];
    }
}
