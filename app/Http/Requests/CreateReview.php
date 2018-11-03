<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReview extends FormRequest
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
