<?php

namespace App\Http\Requests;

class CreatePizza extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'ingredients' => 'required|array'
        ];
    }
}
