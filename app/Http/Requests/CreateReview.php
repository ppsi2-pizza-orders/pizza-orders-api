<?php

namespace App\Http\Requests;

class CreateReview extends AbstractApiRequest
{
    public function rules()
    {
        return [
            "base_rating" => "required|integer|between:1,5",
            "ingredients_rating" => "required|integer|between:1,5",
            "delivery_time_rating" => "required|integer|between:1,5",
        ];
    }
}
