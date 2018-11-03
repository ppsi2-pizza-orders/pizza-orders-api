<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurant extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required",
            "city" => "required",
        ];
    }
}
