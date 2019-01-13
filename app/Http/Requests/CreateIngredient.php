<?php

namespace App\Http\Requests;

class CreateIngredient extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'mimes:jpeg,gif,png',
            'thumbnail' => 'mimes:jpeg,gif,png',
            'index' => 'integer',
        ];
    }
}
