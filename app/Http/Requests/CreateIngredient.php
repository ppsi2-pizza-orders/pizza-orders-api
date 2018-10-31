<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIngredient extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required",
            "price" => "required",
        ];
    }
}
