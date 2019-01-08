<?php

namespace App\Http\Requests;

class CreateIngredient extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,gif,png',
            'thumbnail' => 'required|mimes:jpeg,gif,png',
            'index' => 'integer',
        ];
    }
}
