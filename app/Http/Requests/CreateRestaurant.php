<?php

namespace App\Http\Requests;

class CreateRestaurant extends AbstractApiRequest
{
    public function rules()
    {
        return [
            "name" => "required",
            "city" => "required",
            "address" => "required",
            "phone" => "required|numeric",
        ];
    }
}
