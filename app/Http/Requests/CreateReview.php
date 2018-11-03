<?php

namespace App\Http\Requests;

class CreateReview extends AbstractApiRequest
{
    public function rules()
    {
        return [
            "base_rating" => "required",
            "ingredients_rating" => "required",
            "delivery_time_rating" => "required",
        ];
    }
}
