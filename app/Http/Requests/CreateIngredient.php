<?php

namespace App\Http\Requests;

class CreateIngredient extends AbstractApiRequest
{
    public function rules()
    {
        return [
            "name" => "required",
        ];
    }
}
